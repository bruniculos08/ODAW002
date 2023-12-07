<?php
    session_destroy();
    session_start();
    $_SESSION["login"] = false;
    $_SESSION['ID_Usuario'] = -1;
    header("location: pagina_inicial.php");
    exit;
?>