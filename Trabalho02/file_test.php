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
            <script src="functions.js"></script>
            <div class="w3-container" style="text-align: center;">
                <form id = "postar_receitas" method="post">
                    <br>
                    <text id = "warning_post_receita"> </text>
                    <label for="nome_receita"> Nome da receita: </label>
                    <input type="text" id="nome_receita" name="nome_receita">
                    <br><br>
                    <label for="modo_de_preparo" style="display: block; margin-bottom: 10px;"> Modo de preparo: </label>
                    <!-- <input type="text" id="modo_de_preparo" name="modo_de_preparo" height="50"> -->
                    <!-- <br><br> -->
                    <textarea id="modo_de_preparo" name="modo_de_preparo" rows="7" cols="50" required> </textarea>
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
                    <script src="functions.js"></script>
                    <button type="button" onclick="postReceipe()"> Postar </button>
                    <br><br>
                </form>
            </div>

</body>
</html>