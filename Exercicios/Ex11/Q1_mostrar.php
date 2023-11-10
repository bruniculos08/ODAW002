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
    Banco de Dados - Mostrar  
    <table>
    <?php
        $query = "select * from dogs";
        $result = mysqli_query($conexao, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><th>". $row["id"] ."</th>\n<th>". $row["name"] ."</th>\n<th>". $row["breeds"] . 
            "</th>\n</tr>\n";
        }
    ?>
    </table>
</p>

</body>
</html>