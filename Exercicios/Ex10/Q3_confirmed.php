<?php
    session_start();
?>

<p>
    Formulário de teste 
    <br>
    <br>
    Bem-vindo <span> 
        seu usuário criptografado com hash md5 é <?php echo($_SESSION["name"]);?>
        e sua senha é <?php echo($_SESSION["password"]);?> 
    </span> <br>
</p>

<?php 
    session_destroy(); 
?> 