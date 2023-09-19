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
    var b = document.getElementById("termos_e_condicoes").value;
    console.log(b);
    if(b.toString() === "off"){
        document.getElementById("warning_termos_e_condicoes").innerHTML = 
        "<font color='red'> <br> Você deve aceitar os termos e condições para continuar. </font>";
        return false
    }
    return true;
}

function checkCPF(){
    let test_cpf = document.getElementById("cpf").value;
    let cpf = test_cpf; 

    console.log("cpf's:");
    console.log(test_cpf);
    console.log(cpf);

    var firstDigit = 0, i = 0;
    for(var count = 10; count > 1; count--){
        firstDigit += parseInt(cpf[i]) * count; 
        i++;
    }
    firstDigit = firstDigit % 11;
    if(firstDigit < 2) firstDigit = 0;
    else firstDigit = 11 - firstDigit;
    cpf[i] = firstDigit;
    
    secondDigit = 0, i = 0;
    for(var count = 11; count > 1; count--){
        secondDigit += parseInt(cpf[i]) * count; 
        i++;
    }
    secondDigit = secondDigit % 11;
    if(secondDigit < 2) secondDigit = 0;
    else secondDigit = 11 - secondDigit;
    cpf[i] = secondDigit;

    console.log(firstDigit);
    console.log(secondDigit);

    if(test_cpf.toString() === cpf.toString()) return true;
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

function clearAllInnerHTML(){
    document.getElementById("warning_cadastro").innerHTML = "";
    document.getElementById("warning_cpf").innerHTML = "";
    document.getElementById("warning_termos_e_condicoes").innerHTML = "";
    document.getElementById("warning_senha").innerHTML = "";
}

function checkSignUp(){
    if(checkEmptyNameEmailCPF() && checkCPF() && checkTermsAndConditions() && checkSignUpDate() && checkSignUpPassword()){
        document.getElementById('sign_up').reset();
        document.getElementById("warning_cadastro").innerHTML = 
            "<font color='green'> Cadastro feito com sucesso! <br> </font>";
        // document.getElementById('menu-cadastro').style.display='none';
        // document.getElementById('menu-login').style.display='block';
    }
    else{
        document.getElementById('sign_up').reset();
    }
}