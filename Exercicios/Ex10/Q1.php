<!DOCTYPE HTML>
<html>  
<body>
<style>
.error {color: #FF0000;}
</style>

<?php
    session_start();

    echo '<pre>';
    print_r($_SESSION);

    // nome de variáveis para confirmação:
    $name = $email = $password = $github = $radio
    = $terms_and_conditons = "";

    
    // variáveis para erros:
    $name_error = $email_error = $password_error = $githubErr = $radio_error
    = $terms_and_conditons_error = "";

    $boolean_for_confirmation = false;

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function choose_page($boolean_for_confirmation){
        
        // muda o valor de cada variável de erro caso aconteça algum erro, para que...
        // ... então o avisor apareçam:
        if($_SERVER["REQUESTED_METHOD"] == "POST"){
            // qual o valor inicial de "$_SERVER["REQUESTED_METHOD"]"?
            
            $name = $_POST["name"];
            $email = $_POST["email"];
            $github = $_POST["github"];
            
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
            print_r("batata");
            echo htmlspecialchars($_SERVER["PHP_SELF"]);
            include 'Q1_confirmation.php';
        }
        else{
            include 'Q1_confirmation.php';
            // readfile("Q1_confirmation.php");
            // echo file_get_contents("Q1_confirmation.php");
        }
    }

?>

<p>
Formulário de teste
    <?php 
    if($_SESSION["forms_error_name_empy"]){
        echo "<div>faltou nome</div>";
    } 
    if($_SESSION["forms_error_email_empy"]){
        echo "<div>faltou email</div>";
    }
    if($_SESSION["forms_error_github_empy"]){
        echo "<div>faltou github</div>";
    } 
    session_destroy();
    ?>

    <!-- A action é a função (script) chamada ao ocorrer submit na página: -->
    <!-- <form method="POST" action="<?php choose_page($boolean_for_confirmation);?>"> -->
    <form method="POST" action="requisicao_formulario_x.php">
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