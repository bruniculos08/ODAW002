
async function sha256(message) {
    // encode as UTF-8
    const msgBuffer = new TextEncoder().encode(message);                    

    // hash the message
    const hashBuffer = await crypto.subtle.digest('SHA-256', msgBuffer);

    // convert ArrayBuffer to Array
    const hashArray = Array.from(new Uint8Array(hashBuffer));

    // convert bytes to hex string                  
    const hashHex = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
    return hashHex;
}

function hashAndSave(){
    // Como a função de sha256 é "async" ela retorna um objeto do tipo "Promise" com o valor de retorno...
    // ... esperado como o atributo valor deste objeto e para acessá-lo se faz o seguinte:
    let p = sha256("Bruno");
    p.then(value => {
        console.log(value);
    }).catch(err => {
        console.log(err); // "Something went wrong"
    });
}

// function getValuePromised(p){
//     const k = await p.then(value => {
//         return value;
//     }).catch(err => {
//         return err; // "Something went wrong"
//     });
//     return k;
// }

function checkSignUpDate(){
    const today = new Date;
    const yyyy = today.getFullYear();
    let mm = today.getMonth() + 1;
    let dd = today.getDate();

    const data_de_nascimento = document.getElementById("data_de_nascimento").value;

    if(Number(data_de_nascimento.slice(0, 3+1)) >= Number(yyyy) - 10){
        document.getElementById("warning_data_de_nascimento").innerHTML = "<font color='red'> A idade minínima é 10 anos </font>";
        return false;
    }
    return true;
}

function checkSignUpPassword(){
    var password = document.getElementById("senha_sign_up").value; 
    var confirmedPassWord = document.getElementById("senha_confirmada").value;
    
    console.log(password);
    console.log(confirmedPassWord);
    
    if(password.toString() === confirmedPassWord.toString() != true){
        document.getElementById("warning_senha").innerHTML = "<font color='red'> <br> Senhas diferentes! </font>";
        return false;
    }
    else if(password.length < 8){
        document.getElementById("warning_senha").innerHTML = "<font color='red'> <br> A senha deve conter pelo menos 8 dígitos! </font>";
        return false;
    }
    return true;
}

function checkTermsAndConditions(){
    var b = document.getElementById("termos_e_condicoes").checked;
    console.log(b);
    if(b == false){
        document.getElementById("warning_termos_e_condicoes").innerHTML = 
        "<font color='red'> <br> Você deve aceitar os termos e condições para continuar. </font>";
        return false
    }
    return true;
}

function checkCPF(){
    var cpf = document.getElementById("cpf").value;

    console.log("Últimos digitios:")
    console.log(cpf[9])
    console.log(cpf[10])

    var firstDigit = 0, i = 0;
    for(var count = 10; count > 1; count--){
        firstDigit += parseInt(cpf[i]) * count; 
        i++;
    }
    firstDigit = firstDigit % 11;
    if(firstDigit < 2) firstDigit = 0;
    else firstDigit = 11 - firstDigit;
    
    secondDigit = 0, i = 0;
    for(var count = 11; count > 1; count--){
        secondDigit += parseInt(cpf[i]) * count; 
        i++;
    }
    secondDigit = secondDigit % 11;
    if(secondDigit < 2) secondDigit = 0;
    else secondDigit = 11 - secondDigit;

    if(cpf[9] == firstDigit && cpf[10] == secondDigit) return true;
    document.getElementById("warning_cpf").innerHTML = "<font color='red'> CPF inválido! <br> </font>";
    return false;
}

function checkEmptyNameEmailCPF(){
    let cpf = document.getElementById("cpf").value;
    let email = document.getElementById("email_cadastro").value;
    let name = document.getElementById("primeiroNomeCadastro").value;
    let lastName = document.getElementById("ultimoNomeCadastro").value;
    
    if(cpf.length != 11 || name === "" || lastName === "" || email === ""){
        document.getElementById("warning_cadastro").innerHTML = "<font color='red'> Campos vazios! <br> </font>";
        return false;
    }
    return true;
}

function checkEmptyNomeModoTempoImagem(){
    let nome_receita = document.getElementById("nome_receita").value;
    let modo_de_preparo = document.getElementById("modo_de_preparo").value;
    let tempo_de_preparo = document.getElementById("tempo_de_preparo").value;
    let imagem_receita = document.getElementById("imagem_receita").value;
    let ingredientes = document.getElementById("ingredientes").value;

    if(nome_receita === "" || modo_de_preparo === "" || ingredientes === "" || tempo_de_preparo == null || tempo_de_preparo <= 0){
        document.getElementsByName("warning_post_receita") = "<font color='red'> Campos vazios! <br> </font>";
        return false;
    }
    return true;
}

function clearAllInnerHTML(){
    document.getElementById("warning_cadastro").innerHTML = "";
    document.getElementById("warning_cpf").innerHTML = "";
    document.getElementById("warning_termos_e_condicoes").innerHTML = "";
    document.getElementById("warning_senha").innerHTML = "";
}

function postRecipe(){
    document.getElementById("warning_post_receita").innerHTML = "";
    clearAllInnerHTML();

    if(checkEmptyNomeModoTempoImagem()){

        let nome_receita = document.getElementById("nome_receita").value;
        let modo_de_preparo = document.getElementById("modo_de_preparo").value;
        let tempo_de_preparo = document.getElementById("tempo_de_preparo").value;
        let imagem_receita = document.getElementById("imagem_receita").value;
        let ingredientes = document.getElementById("ingredientes").value;
        
        console.log(`nome_receita=${nome_receita}&modo_de_preparo=${modo_de_preparo}&tempo_de_preparo=${tempo_de_preparo}&imagem_receita=${"semimagem"}
        &ingredientes=${ingredientes}`);

        fetch("http://localhost/Trabalho02/Database/insert_receita.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
            },
            body: `nome_receita=${nome_receita}&modo_de_preparo=${modo_de_preparo}&tempo_de_preparo=${tempo_de_preparo}&ingredientes=${ingredientes}`,
        })
        .then((response) => response.text())
        .then((res) => (document.getElementById("warning_post_receita").innerHTML = res));
        
        document.getElementById('postar_receitas').reset();
    }
    else{
        document.getElementById('postar_receitas').reset();
    }
}

function deleteRecipe(id){
    fetch("http://localhost/Trabalho02/Database/delete_receita.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
            },
            body: `ID_Receita=${id}`,
        })
        .then((response) => response.text())
        .then((res) => (console.log(res)));
    location.reload();
}

function checkSignIn(){
    clearAllInnerHTML();

    let email = document.getElementById("email").value;
    var senha = document.getElementById("senha_sign_in").value; 
    
    var resp = "teste";

    fetch("http://localhost/Trabalho02/Database/insert_sign_in.php", {
        method: "POST",
        headers: {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
            },
            body: `email=${email}&senha=${senha}`,
        })
    .then((response) => response.text())
    .then((res) => {
        resp = res;

        console.log("warning_login: ");
        console.log(resp);
        console.log("result:");
        console.log(resp.length);

        if(resp.length == 1){
            location.reload();
        }
        else{
            document.getElementById("warning_login").innerHTML = res;
        }
    });
    
    document.getElementById('sign_in').reset();
}

function checkSignUp(){
    clearAllInnerHTML();

    if(checkEmptyNameEmailCPF() && checkCPF() && checkTermsAndConditions() && checkSignUpDate() && checkSignUpPassword()){

        let cpf = document.getElementById("cpf").value;
        let email = document.getElementById("email_cadastro").value;
        let nome = document.getElementById("primeiroNomeCadastro").value;
        let sobrenome = document.getElementById("ultimoNomeCadastro").value;
        var senha = document.getElementById("senha_sign_up").value; 
        var senha_confirmada = document.getElementById("senha_confirmada").value;
        
        fetch("http://localhost/Trabalho02/Database/insert_sign_up.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
            },
            body: `cpf=${cpf}&email=${email}&nome=${nome}&sobrenome=${sobrenome}
            &senha=${senha}&senha_confirmada=${senha_confirmada}`,
        })
        .then((response) => response.text())
        .then((res) => (document.getElementById("warning_cadastro").innerHTML = res));
        
        document.getElementById('sign_up').reset();
    }
    else{
        document.getElementById('sign_up').reset();
    }
}

function logout(){
    var stuff;
    fetch("http://localhost/Trabalho02/sair.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
            },
            body: ``,
        })
        .then((response) => response.text())
        .then((res) => (stuff = res));
    location.reload();
}

function alertar(aviso){
    alert(aviso);
}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

// handles the click event for link 1, sends the query
function getOutputInsertInDataBase() {
    getRequest(
        'Database/insert_sign_up.php', // URL for the PHP file
         drawOutput,  // handle successful request
         drawError    // handle error
    );
    return false;
  }  
  // handles drawing an error message
  function drawError() {
      var container = document.getElementById('output');
      container.innerHTML = 'Bummer: there was an error!';
  }
  // handles the response, adds the html
  function drawOutput(responseText) {
      var container = document.getElementById('output');
      container.innerHTML = responseText;
  }
  // helper function for cross-browser request object
  function getRequest(url, success, error) {
      var req = false;
      try{
          // most browsers
          req = new XMLHttpRequest();
      } catch (e){
          // IE
          try{
              req = new ActiveXObject("Msxml2.XMLHTTP");
          } catch(e) {
              // try an older version
              try{
                  req = new ActiveXObject("Microsoft.XMLHTTP");
              } catch(e) {
                  return false;
              }
          }
      }
      if (!req) return false;
      if (typeof success != 'function') success = function () {};
      if (typeof error!= 'function') error = function () {};
      req.onreadystatechange = function(){
          if(req.readyState == 4) {
              return req.status === 200 ? 
                  success(req.responseText) : error(req.status);
          }
      }
      req.open("GET", url, true);
      req.send(null);
      return req;
}