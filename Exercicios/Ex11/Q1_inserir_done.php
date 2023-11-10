<?php
    $conexao = new mysqli("localhost","odaw","odaw","petshop");
    if ($conexao -> connect_errno) {
        die('Não foi possível conectar: ' . $conexao -> connect_error);
    }
    echo 'Conexão bem sucedida <br>';
    
    $name = $_POST["name"];
    $breeds = $_POST["breeds"];
    
    $query_max_id = mysqli_query($conexao,"select max(id) from dogs");
    $row_max_id = mysqli_fetch_array($query_max_id);
    $max_id = intval($row_max_id["max(id)"]) + 1;

    $query = "INSERT INTO dogs (id, name, breeds) VALUES ('$max_id', '$name', '$breeds');";

    echo $query;
    mysqli_query($conexao, $query);
    mysqli_close($conexao);
    header("Location: Q1_mostrar.php");
?>