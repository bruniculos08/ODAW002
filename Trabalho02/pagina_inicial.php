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
            background-image: url('https://www.hashmicro.com/blog/wp-content/uploads/2022/01/Saluran-Distribusi14.png');
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
        /* Estilo da textarea: */
        textarea {
            padding: 10px;
            max-width: 100%;
            line-height: 1.5;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: 1px 1px 1px #999;
        }
        /* Estilo do label (nome das caixas em formulários) */
        /* label {
            display: block;
            margin-bottom: 10px;
        } */
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
            <!-- <div class="w3-col s3">
                <a href="pagina-inicial.html" class="w3-button w3-block w3-black"> INÍCIO </a>
            </div>
            <div class="w3-col s3">
                <p> </p>
            </div>
            <div class="w3-col s3">
                <a onclick="document.getElementById('menu-cadastro').style.display='block'"
                    class="w3-button w3-block w3-black">
                    CADASTRO
                </a>
            </div> -->
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

        <!-- Botões  -->

        <!-- Botão Lista de Receitas -->
        <div class="row" style="position: fixed; left: 40%; top: 38%;">
            <div class="bgimg w3-display-container w3-text-white">
                <div class="w3-display-topleft w3-container w3-xlarge"
                    style="font-family: 'Courier New', Courier, monospace;">
                    <!-- <p><button onclick="document.getElementById('Lista de Receitas').style.display='block'"
                        class="w3-button w3-black">Lista de Receitas</button></p> -->
                    <p><a class="w3-button w3-black" href="pagina_lista_receitas.php"
                        class="w3-button w3-black">Lista de Receitas</a>
                    </p>
                    
                </div>
            </div>
        </div>

        <!-- Botão de Postar Receitas -->
        <div class="row" style="position: fixed; left: 41%; top: 50%;">
            <div class="bgimg w3-display-container w3-text-white">
                <br>
                <div class="w3-display-topleft w3-container w3-xlarge"
                    style="font-family: 'Courier New', Courier, monospace;">
                    <?php 
                        if($_SESSION["login"] == true){
                            echo "  
                                <button class=\"w3-button w3-black\" type=\"button\" 
                                onclick=\"document.getElementById('menu-postar-receitas').style.display='block'\"> 
                                    Postar Receitas 
                                </button>
                            ";
                        }
                        else {
                            echo "
                                <button class=\"w3-button w3-black\" type=\"button\" onclick=\"alertar('É necessário logar')\">
                                    Postar Receitas 
                                </button>
                            ";
                        }
                    ?>
                </div>
            </div>
        </div>

        <!-- Menu's pop-up -->
        <!-- Pop-up lista de receitas -->

        <script src="functions.js"></script>

        <div id="Lista de Receitas" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black w3-display-container">
                    <span onclick="document.getElementById('Lista de Receitas').style.display='none'"
                        class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Lista de Receitas</h1>
                </div>
                <div class="w3-container">
                    <h5> <a href="caçarola-de-frango.html" target="_blank" rel="external" hreflang="pt"
                            type="text/html"> Caçarola de Frango </a> </h5>
                    <h5> Bife Chili (Apimentado) </h5>
                    <h5> Molho de Queijo </h5>
                    <h5> Escondidinho de Camarão </h5>
                    <h5> Macarrão Alho e Oleo </h5>
                </div>
                <!-- <div class="w3-container w3-black">
                    <h1>Main Courses</h1>
                </div>
                <div class="w3-container">
                    <h5>Grilled Fish and Potatoes <b>$8.50</b></h5>
                    <h5>Italian Pizza <b>$5.50</b></h5>
                    <h5>Veggie Pasta <b>$4.00</b></h5>
                    <h5>Chicken and Potatoes <b>$6.50</b></h5>
                    <h5>Deluxe Burger <b>$5.00</b></h5>
                </div>
                <div class="w3-container w3-black">
                    <h1>Desserts</h1>
                </div>
                <div class="w3-container">
                    <h5>Fruit Salad <b>$2.50</b></h5>
                    <h5>Ice cream <b>$2.00</b></h5>
                    <h5>Chocolate Cake <b>$4.00</b></h5>
                    <h5>Cheese <b>$5.50</b></h5>
                </div> -->
            </div>
        </div>

        <!-- Pop-up para postar receita -->
        <div id="menu-postar-receitas" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black w3-display-container">
                    <span onclick="document.getElementById('menu-postar-receitas').style.display='none'"
                        class="w3-button w3-display-topright w3-large">x</span>
                    <h1>Postar Receitas</h1>
                </div>
                <script src="functions.js"></script>
                <div class="w3-container" style="text-align: center;">
                    <form id = "postar_receitas" method="post">
                        <br>
                        <text id = "warning_post_receita"> </text>
                        <label for="nome_receita"> Nome da receita: </label>
                        <input type="text" id="nome_receita" name="nome_receita">
                        <br><br>
                        <label for="modo_de_preparo" style="display: block; margin-bottom: 10px;"> Modo de preparo: </label>
                        <textarea id="modo_de_preparo" name="modo_de_preparo" rows="7" cols="50" required> </textarea>
                        &nbsp;
                        <br><br>
                        <label for="ingredientes" style="display: block; margin-bottom: 10px;"> Ingredientes: </label>
                        <textarea id="ingredientes" name="ingredientes" rows="4" cols="50" required> </textarea>
                        &nbsp;
                        <br><br>
                        <label for="tempo_de_preparo"> Tempo de preparo (em minutos): </label>
                        <input type="number" id="tempo_de_preparo" name="tempo_de_preparo" required>
                        &nbsp;
                        <br><br>
                        <label for="imagem_receita"> Imagem: </label>
                        <input type="file" id="imagem_receita" name="imagem_receita" accept="image/png, image/jpeg" required>
                        &nbsp;
                        <br><br>
                        <button type="reset"> Limpar </button>
                        <button type="button" onclick="postRecipe()"> Postar </button>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>

        <!-- Pop-up de login -->
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

        <!-- Pop-up de cadastro -->
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
                        <!-- <button type="submit"> Finalizar </button> -->
  
                        <!-- <button id="submit_sign_up" type="submit"> Finalizar </button>

                        <div id="result"></div>
  
                        <script>
                            let btn = document.getElementById("submit_sign_up");
                            let x = 5;
                            let y = 3;

                            btn.addEventListener("click", function(){
                            fetch("http://localhost/Trabalho02/add_teste_func.php", {
                                method: "POST",
                                headers: {
                                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                                },
                                body: `x=${x}&y=${y}`,
                            })
                            .then((response) => response.text())
                            .then((res) => (document.getElementById("result").innerHTML = res));
                            })

                            console.log(document.getElementById("result").innerHTML);
                        </script> -->

                        <br><br>

                    </form>
                </div>
            </div>
        </div>        
    </article>

    <!-- Rodapé -->
    <div class="row">
        <div class="w3-row w3-padding w3-black">
            <div class=" w3-col s3">
                <!-- se colocar #[algum_id] no href abaixo ele leva para a parte da página que contém o item com aquele id -->
            <a href="pagina_sobre_nos.php" class="w3-button w3-block w3-black">SOBRE NÓS</a>
        </div>
        <div class="w3-col s3">
            <p> </p>
        </div>
        <div class="w3-col s3">
            <p> </p>
        </div>
        <div class="w3-col s3">
            <a href="pagina_politica_copyright.php" class="w3-button w3-block w3-black">POLÍTICA DE COPYRIGHT </a>
        </div>
    </div>
    </div>
</body>
</html>

</body>
</html>