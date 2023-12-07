<?php

        session_start();

        $conexao = new mysqli("localhost","odaw","odaw","site_receitas");
        if ($conexao -> connect_errno) {
            die('Não foi possível conectar: ' . $conexao -> connect_error);
        }

        $id = $_POST['ID_Receita'];

        // Parte da inserção no banco de dados

        $query = "DELETE FROM receitas WHERE ID_Receita = '$id';";

        // Lembre-se que o retorno para a função que chama este código é o que este código printa (echo).
        echo $query;

        mysqli_query($conexao, $query);

        // if(mysqli_query($conexao, $query) != false){
        // echo "<font color='green'> Post feito com sucesso. <br> </font>";
        // }
        // else{
        //     echo "<font color='erro'> Erro no Post. <br> </font>";
        // }
        mysqli_close($conexao);

        // Colocar imagem no diretório:
?>