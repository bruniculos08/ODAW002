<?php
    $conexao = new mysqli("localhost","odaw","odaw","petshop");
    if ($conexao -> connect_errno) {
        die('Não foi possível conectar: ' . $conexao -> connect_error);
    }
    echo 'Conexão bem sucedida <br>';
    
    $id = strval($_POST["id"]);
    $name = strval($_POST["name"]);
    $breeds = strval($_POST["breeds"]);
    
    echo strval($id) . strval(empty($name)) . strval(empty($breeds)) . '<br>';

    if(empty($id) or (empty($name) and empty($breeds))) {
        echo "<br> Você deve preencher o campo id e pelo menos um dos campos novo nome ou nova raça </br>";
        include "Q1_alterar.php";
    } else {
        $query = "UPDATE dogs SET name = '$name', breeds = '$breeds' WHERE id = '$id'";
        // if(!empty($name) and !empty($breeds)) {
        //     $query = "UPDATE dogs SET nome='$name', breeds='$breeds' WHERE id='$id'";
        // } else if(!empty($name)) {
        //     $query = "UPDATE dogs SET nome='$name' WHERE id='$id'";
        // } else if(!empty($breeds)) {
        //     $query = "UPDATE dogs SET breeds='$breeds' WHERE id='$id'";
        // }
        echo $query;
        $result = mysqli_query($conexao, $query);
        echo strval($result);
        mysqli_close($conexao);
        // header("Location: Q1_mostrar.php");
    }  
?>