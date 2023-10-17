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
</p>

<?php 
    session_destroy(); 
?> 