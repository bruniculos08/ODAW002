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
    Banco de Dados - Deletar  
    <form method="POST" action="Q1_deletar_done.php">
        <br>
        Id: <input type="text" name="id" required>
        <br>
        <!-- Nome: <input type="text" name="name" required>
        <br>
        Raça: <input type="text" name="breeds" required>
        <br> -->
        <input type="submit" name="submit" value="Submit">
    </form>
</p>

</body>
</html>