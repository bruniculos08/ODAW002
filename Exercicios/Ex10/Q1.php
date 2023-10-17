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
    <?php 
        if($_SESSION["forms_error_name_empty"]){
            echo "<div>Nome é necessário.</div>";
        } 
        if($_SESSION["forms_error_email_empty"]){
            echo "<div>E-mail inválido.</div>";
        }
        if($_SESSION["forms_error_github_empty"]){
            echo "<div>URL inválida (github).</div>";
        } 
        session_destroy();
    ?>

    <form method="POST" action="Q1_verify.php">
        <!-- O script PHP em value faz com que caso o usuário
        digite o conteúdo e ocorra um erro seja recarregado o que havia
        sido digitado: -->
        <br>
        Nome: <input type="text" name="name">
        <br>
        E-mail: <input type="text" name="email">
        <br>
        Github: <input type="text" name="github">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
</p>

</body>
</html>