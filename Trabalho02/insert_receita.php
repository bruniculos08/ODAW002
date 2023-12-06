<?php

        session_start();

        $conexao = new mysqli("localhost","odaw","odaw","site_receitas");
        if ($conexao -> connect_errno) {
            die('Não foi possível conectar: ' . $conexao -> connect_error);
        }

        $id_usuario = $_SESSION['ID_Usuario'];
        $nome_receita = $_POST['nome_receita'];
        $modo_de_preparo = $_POST['modo_de_preparo'];
        $tempo_de_preparo = $_POST['tempo_de_preparo'];

        // Parte da inserção no banco de dados

        $query_verify_modo_de_preparo = mysqli_query($conexao, "SELECT EXISTS (SELECT 1 from receitas WHERE modo_de_preparo = '$modo_de_preparo') AS row_exists");
        if($query_verify_modo_de_preparo){
            $result = mysqli_fetch_assoc($query_verify_modo_de_preparo);
            $value = intval($result["row_exists"]);

            if($value == 1){
                echo "<font color='erro'> Erro no post da receita (modo de preparo já existente). <br> </font>";
                exit;
            }
        }

        $query_max_id = mysqli_query($conexao,"select max(ID_Receita) from receitas");

        if($query_max_id){
            $row_max_id = mysqli_fetch_assoc($query_max_id);
            $max_id = intval($row_max_id["max(ID_Receita)"]) + 1;
        }
        else{
            $max_id = 0;
        }
        
        $avaliacao = 0;
        $caminho_imagem = "nao existe";

        $query = "INSERT INTO receitas (ID_Receita, nome_receita, modo_de_preparo, avaliacao, tempo_de_preparo, caminho_imagem, ID_Usuario) VALUES 
            ('$max_id', '$nome_receita', '$modo_de_preparo', '$avaliacao', '$tempo_de_preparo', '$caminho_imagem', '$id_usuario');";

        // Lembre-se que o retorno para a função que chama este código é o que este código printa (echo).
        // echo $query;

        if(mysqli_query($conexao, $query) != false){
            echo "<font color='green'> Post feito com sucesso. <br> </font>";
        }
        else{
            echo "<font color='erro'> Erro no Post. <br> </font>";
        }
        mysqli_close($conexao);

        // Colocar imagem no diretório:
?>