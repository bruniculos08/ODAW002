<?php
    session_start();
?>

<p>
    Formulário de teste 
    <br>
    <br>
    Bem-vindo <span> 
        <?php echo($_SESSION["name"]);?> 
    </span> <br>
    Seu endereço de e-mail é <span> 
        <?php echo($_SESSION["email"]);?> 
    </span> <br>
    Seu perfil no github é <span> 
        <?php echo($_SESSION["github"]);?> 
    </span>
</p>

<?php 
    session_destroy(); 
?> 