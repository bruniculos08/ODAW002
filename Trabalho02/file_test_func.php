<?php

        $conexao = new mysqli("localhost","odaw","odaw","site_receitas");
        if ($conexao -> connect_errno) {
            die('Não foi possível conectar: ' . $conexao -> connect_error);
        }

        // $id_usuario = $_SESSION['ID_Usuario'];
        $id_usuario = 1;
        $nome_receita = $_POST['nome_receita'];
        $modo_de_preparo = $_POST['modo_de_preparo'];
        $tempo_de_preparo = $_POST['tempo_de_preparo'];
        

        // Parte da inserção no banco de dados

        // $query_verify_modo_de_preparo = mysqli_query($conexao, "SELECT EXISTS (SELECT 1 from receitas WHERE modo_de_preparo = '$modo_de_preparo') AS row_exists");
        // if($query_verify_email){
        //     $result = mysqli_fetch_assoc($query_verify_modo_de_preparo);
        //     $value = intval($result["row_exists"]);

        //     if($value == 1){
        //         echo "<font color='erro'> Erro no post da receita (modo de preparo já existente). <br> </font>";
        //         exit;
        //     }
        // }

        $query_max_id = mysqli_query($conexao,"select max(ID_Receita) from receitas");

        if($query_max_id){
            $row_max_id = mysqli_fetch_assoc($query_max_id);
            $max_id = intval($row_max_id["max(ID_Receita)"]) + 1;
        }
        else{
            $max_id = 0;
        }

        $imagem_receita_nome = strval($max_id) . $_FILES['imagem_receita']['tmp_name'];
        
        $avaliacao = 0;
        $caminho_imagem = "Images/".$imagem_receita_nome;

        $query = "INSERT INTO receitas (ID_Receita, nome_receita, modo_de_preparo, avaliacao, tempo_de_preparo, caminho_imagem, ID_Usuario) VALUES 
            ('$max_id', '$nome_receita', '$modo_de_preparo', '$avaliacao', '$tempo_de_preparo', '$caminho_imagem', '$id_usuario');";

        // Lembre-se que o retorno para a função que chama este código é o que este código printa (echo).
        // echo $query;

        if(mysqli_query($conexao, $query) != false){
            // echo "<font color='green'> Post feito com sucesso. <br> </font>";
            echo "<font color='red'>" . $_POST['imagem_receita']['tmp_name'] . "<br> </font>";
        }
        else{
            echo "<font color='erro'> Erro no Post. <br> </font>";
        }
        mysqli_close($conexao);

        // Colocar imagem no diretório:
        $target_file = "Images/" . basename($_POST['imagem_receita']['name']);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["imagem_receita"]["tmp_name"], $target_file);
?>