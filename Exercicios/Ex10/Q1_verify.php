<?php
    session_start();
    
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $github = test_input($_POST["github"]);
    // $name = ($_POST["name"]);
    // $email = ($_POST["email"]);
    // $github = ($_POST["github"]);

    $_SESSION["name"] = $_POST["name"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["github"] = $_POST["github"];

    
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
        $y = false;
    } else {
        $y = true;
    }
    
    if((!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$github))){
        $x = false;
    } else {
        $x = true;
    }

    // if(empty($name) || empty($email) || empty($github)){
    if(empty($name) || empty($email) || empty($github) || !$x || !$y ){
        $_SESSION["forms_error_name_empty"] = empty($name);
        $_SESSION["forms_error_email_empty"] = empty($email) || !$y;
        // $_SESSION["forms_error_email_empy"] = empty($email);
        $_SESSION["forms_error_github_empty"] = empty($github) || !$x;
        // $_SESSION["forms_error_github_empy"] = empty($github);
        // $boolean_for_confirmation = false;
        header('Location: Q1.php');
    } else {
        header('Location: Q1_confirmation.php');
    }
?>