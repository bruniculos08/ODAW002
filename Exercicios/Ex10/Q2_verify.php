<?php
    session_start();
    
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    $name = test_input($_POST["name"]);
    // $password = test_input($_POST["password"]);
    $password = htmlspecialchars($_POST["password"]);
    // $name = ($_POST["name"]);
    // $email = ($_POST["email"]);

    $_SESSION["name"] = $_POST["name"];
    $_SESSION["password"] = $_POST["password"];
    $_SESSION["login_error"] = true;
    
    $myfile = fopen("Q2.txt", "r") or die("Unable to open file!");
    $line = '';
    while(!feof($myfile)){
        $line = fgets($myfile);
        $line = str_replace("\n","",$line);
        echo $line;
        // $line = test_input($line);
        if($line == "user:"){
            header("Location: Q2_confirmation.php");
            $line = fgets($myfile);
            $line = str_replace("\n","",$line);
            if($line == ($_SESSION["name"])){
                $line = fgets($myfile);
                $line = fgets($myfile);
                $line = str_replace("\n","",$line);
                if($line == ($_SESSION["password"])){
                    $_SESSION["login_error"] = false;
                    header("Location: Q2_confirmation.php");
                    // session_destroy();
                    // exit;
                }
            }
        }
    }

    // header("Location: Q2.php");
    session_destroy();
    exit;
?>