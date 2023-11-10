<?php
    session_start();
    
    //print_r($_POST);

    //echo getcwd();
    //echo "\n";
    //$myfile = fopen("Q3.txt", "c") or die("Unable to open file.");
    
    //fwrite($myfile, md5(htmlspecialchars($_POST["name"])));
    //fwrite($myfile, "\n");
    //fwrite($myfile, md5(htmlspecialchars($_POST["password"])));

    $_SESSION["name"] = md5(htmlspecialchars($_POST["name"]));
    $_SESSION["password"] = md5(htmlspecialchars($_POST["password"]));

    header("Location: Q3_confirmed.php");
?>