<!DOCTYPE HTML>
<html>  
<body>
<style>
.error {color: #FF0000;}
table, th, td {
  border:1px solid black;
}
</style>

<?php

    $conexao = new mysqli("localhost","odaw","odaw","petshop");
    if ($conexao -> connect_errno) {
        die('Não foi possível conectar: ' . $conexao -> connect_error);
    }
    echo 'Conexão bem sucedida';

?>

<p>
    Banco de Dados - Inserir  
    <form method="POST" action="Q1_alterar_done.php">
        <br>
        Id da linha a ser alterada: <input type="text" name="id" required>
        <br>
        Novo nome: <input type="text" name="name">
        <br>
        Nova raça: <input type="text" name="breeds">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
</p>

</body>
</html>