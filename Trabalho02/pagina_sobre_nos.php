<!DOCTYPE HTML>
<html>  
<body>
<style>
.error {color: #FF0000;}
</style>

<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title> Receitas </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

    <style>
        /* Define o tamanho da box de todos os itens como "border-box"? */
        * {
            box-sizing: border-box;
        }
        h1,
        h5 {
            font-family: 'Courier New', Courier, monospace;
        }

        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f1f1f1;
            /* background-image: url('https://www.hashmicro.com/blog/wp-content/uploads/2022/01/Saluran-Distribusi14.png'); */
            background-position: center;
            background-size: cover;
            /* Adicionado para forçar a tag article a ocupar o meio da página inteira,...
            ... isto é, forçar o footer abaixo */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        input[type=email],
        select {
            width: 40%;
            padding: 12px, 20px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=text],
        select {
            width: 25%;
            padding: 12px, 20px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=password],
        select {
            width: 25%;
            padding: 12px, 20px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        /* Adicionado para forçar a tag article a ocupar o meio da página inteira,...
        ... isto é, forçar o footer abaixo */
        article {
            flex: 1;
        }
        /* Style the header */
        .header {
            background-color: #f1f1f1;
            padding: 30px;
            text-align: center;
            font-size: 35px;
        }
        /* Create three equal columns that floats next to each other */
        .column {
            float: left;
            /* Esta porcentage de width limita o número de colunas que cabem numa row */
            width: 33.33%;
            padding: 10px;
            height: 300px;
            /* Should be removed. Only for demonstration */
        }
        /* O que é um float: */
        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .row {}
        /* Style the footer */
        .footer {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
        }
        /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
        @media (max-width: 600px) {
            .column {
                width: 100%;
            }
            .footer {
                width: 100%;
            }
            /* Por que o '@'? */
        }
    </style>
</head>
<body>
    <div class="w3-top">
        <div class="w3-row w3-padding w3-black">
            <div class="w3-col s3">
                <a href="pagina_inicial.php" class="w3-button w3-block w3-black"> INÍCIO </a>
            </div>
            <div class="w3-col s3">
                <p> </p>
            </div>
            
            <?php 
                if($_SESSION["login"] != true){
                    echo "
                    <div class=\"w3-col s3\">
                        <a onclick=\"document.getElementById('menu-cadastro').style.display='block'\"
                            class=\"w3-button w3-block w3-black\">
                            CADASTRO
                        </a>
                    </div>
                    ";
                }
                else{
                    echo "
                    <div class=\"w3-col s3\">
                        <p> </p>
                    </div>
                    ";
                }
            ?>
            <script src="functions.js"></script>
            <?php 
                if($_SESSION["login"] == true){
                    echo "
                    <div class=\"w3-col s3\">
                    <a onclick=\"logout()\"
                            class=\"w3-button w3-block w3-black\">
                            SAIR
                        </a>
                    </div>";
                }
                else{
                    echo "<div class=\"w3-col s3\">
                    <a onclick=\"document.getElementById('menu-login').style.display='block'\"
                        class=\"w3-button w3-block w3-black\">
                        LOGIN
                    </a>
                    </div>";
                }
            ?>
        </div>
    </div>

    <article>
        <div style="position: auto; left: 40%; top: 40%;">
            <div class="bgimg w3-display-container w3-text-black ">
                <div class="w3-display-topleft w3-container w3-xlarge"
                    style="font-family: 'Courier New', Courier, monospace; margin-right: 225px; margin-left: 225px;" >
                    <br><br><br><br><br>
                    <h2> Quem somos? </h2>
                    <!-- <h3> Copyright (c) GitFood </h3> -->
                    <h5> Não sei...
                    </h5>
                </div>
            </div>
        </div>

        <div id="menu-login" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black w3-display-container">
                    <span onclick="document.getElementById('menu-login').style.display='none'"
                        class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Login</h1>
                </div>
                <script src="functions.js"></script>
                <div class="w3-container" style="text-align: center;">
                    <form id = "sign_in" method="post">
                        <br>
                        <text id = "warning_login"> </text>
                        <label for="email"> E-mail: </label>
                        <input type="email" id="email" name="email">
                        <br><br>
                        <label for="senha_sign_up"> Senha: </label>
                        <input type="password" id="senha_sign_in" name="senha_sign_in">
                        &nbsp;
                        <br><br>
                        <button type="reset"> Limpar </button>
                        <button type="button" onclick="checkSignIn()"> Login </button>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>

        <div id="menu-cadastro" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black w3-display-container">
                    <span onclick="document.getElementById('menu-cadastro').style.display='none'"
                        class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Cadastro</h1>
                </div>
                <script src="functions.js"></script>
                <div class="w3-container" style="text-align: left; margin-left: 10%;">
                    <form id = "sign_up" method="post">
                        <br>
                        <text id = "warning_cadastro"> </text>
                        <label for="primeiroNomeCadastro"> Nome: </label>
                        <input type="text" id="primeiroNomeCadastro" name="primeiroNomeCadastro">
                        &nbsp;
                        <!-- &nbsp; gera um espaço na linha por isso serve para separar itens da mesma altura da página-->
                        <label for="ultimoNomeCadastro"> Sobrenome: </label>
                        <input type="text" id="ultimoNomeCadastro" name="ultimoNomeCadastro">
                        <br><br>
                        <text id = "warning_cpf"> </text>
                        <label for="cpf"> CPF: </label>
                        <input type="text" id="cpf" name="cpf">
                        <br><br>
                        <label for="email-cadastro"> E-mail: </label>
                        <input type="email" id="email_cadastro" name="email_cadastro">
                        <br><br>
                        <label for="senha_sign_up"> Senha: </label>
                        <input type="password" id="senha_sign_up" name="senha_sign_up">
                        &nbsp;
                        <label for="senha_confirmada"> Confirmar senha: </label>
                        <input type="password" id="senha_confirmada" name="senha_confirmada">
                        <text id = "warning_senha"> </text>
                        <br><br>
                        <label for="data_de_nascimento"> Data de Nascimento: </label>
                        <input type="date" id="data_de_nascimento" name="data_de_nascimento">
                        <text id = "warning_data_de_nascimento"> </text>
                        <br><br>
                        <input type="checkbox" id="termos_e_condicoes" name="termos_e_condicoes">
                        <label for="termos_e_condicoes"> Eu concordo com os
                            <a href="pagina_termos_de_uso.php" target="_blank" rel="external" hreflang="pt" type="text/html">
                                termos e condições.
                            </a>
                            <text id = "warning_termos_e_condicoes"> </text>
                        </label>
                        <br><br>
                        <button type="reset"> Limpar formulário </button>
                        <button type="button" onclick="checkSignUp()"> Finalizar </button>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>

</body>
</html>