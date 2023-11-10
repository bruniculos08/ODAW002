<?php
    $conexao = new mysqli("localhost","odaw","odaw","petshop");
    if ($conexao -> connect_errno) {
        die('Não foi possível conectar: ' . $conexao -> connect_error);
    }
    echo 'Conexão bem sucedida <br>';
    
    // $name = $_POST["name"];
    // $breeds = $_POST["breeds"];
    $id = $_POST["id"];

    $query = "DELETE FROM dogs where id='$id'";

    echo $query;
    $result = mysqli_query($conexao, $query);
    // if(!$result) {
    //     echo "<br> Id inválido <\br>";
    //     include "Q1_deletar";
    // }
    // else{
        mysqli_close($conexao);
        header("Location: Q1_mostrar.php");
    // }
?>