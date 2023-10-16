<?php
    session_start();
    
    // function test_input($data){
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }

    // $name = test_input($_POST["name"]);
    // $email = test_input($_POST["email"]);
    // $github = test_input($_POST["github"]);
    $name = ($_POST["name"]);
    $email = ($_POST["email"]);
    $github = ($_POST["github"]);

    
    // if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
    //     $y = false;
    // } else {
    //     $y = true;
    // }
    
    // if((!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$github))){
    //     $x = false;
    // } else {
    //     $x = true;
    // }

        // if(empty($name) || empty($email) || empty($github) || ~$x || ~$y ){
        if(empty($name) || empty($email) || empty($github)){
            $_SESSION["forms_error_name_empy"] = empty($name);
            // $_SESSION["forms_error_email_empy"] = empty($email) || ~$y;
            $_SESSION["forms_error_email_empy"] = empty($email);
            // $_SESSION["forms_error_github_empy"] = empty($github) || ~$x;
            $_SESSION["forms_error_github_empy"] = empty($github);
            // $boolean_for_confirmation = false;
            header('Location: Q1.php');
        }
        

        // muda o valor de cada variável de erro caso aconteça algum erro, para que...
        // ... então o avisor apareçam:
        if($_SERVER["REQUESTED_METHOD"] == "POST"){
            // qual o valor inicial de "$_SERVER["REQUESTED_METHOD"]"?
            
            // a seguinte variável serve para confirmar se todos as informações do usuário... 
            // ... passaram pelo teste:
            $boolean_for_confirmation = true;
            
            // Se após a ação POST o valor de $_POST["name"] muda-se o valor $name_error para...
            // ... "nome inválido"
            if(trim($_POST["name"]) == ""){
                $boolean_for_confirmation = false;
                $name_error = "nome inválido";
            }
            
            
            if(empty($_POST["email"])) {
                $email_error= "Email necessário";
                $boolean_for_confirmation = false;
            } else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $boolean_for_confirmation = false;
                    $emailErr = "Formato de e-mail inválido";
                }
            }
        
            if (empty($_POST["github"])) {
                $github = "";
                $boolean_for_confirmation = false;
              } else {
                $github = test_input($_POST["github"]);
                // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
                if (!preg_match("/(https://github.com/)[-a-z0-9]*/", $github)) {
                    $githubErr = "Perfil do github inválido.";
                    $boolean_for_confirmation = false;
                }
            }
        }


        if($boolean_for_confirmation == false){
            // echo htmlspecialchars($_SERVER["PHP_SELF"]);
            header('Location: Q1_confirmation.php');
            // include 'Q1_confirmation.php';
        }
        else{
            // include 'Q1_confirmation.php';
            header('Location: Q1_confirmation.php');
            // readfile("Q1_confirmation.php");
            // echo file_get_contents("Q1_confirmation.php");
        }

?>