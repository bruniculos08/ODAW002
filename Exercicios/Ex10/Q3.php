<!DOCTYPE HTML>
<html>  
<body>
<style>
.error {color: #FF0000;}
</style>

<?php
    session_start();
?>

<p>
Formulário de teste
    <form method="POST" action="Q3_response.php">
        <!-- O script PHP em value faz com que caso o usuário
        digite o conteúdo e ocorra um erro seja recarregado o que havia
        sido digitado: -->
        <br>
        Nome: <input type="text" name="name">
        <br>
        Senha: <input type="password" name="password">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
</p>

</body>
</html>