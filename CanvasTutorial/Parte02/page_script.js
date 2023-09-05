// console.log('r/place');
// A seguinte variável receberá a primeira ocorrência do elemento <canvas>:
var canvas = document.querySelector('canvas');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// A variável 'c' será um objeto de contexto 2d (basicamente um objeto...
// ... que servirá para realizar os desenhos):
var c = canvas.getContext('2d');
// Obs.: por padrão, a variável c em canvas sempre se refere à contexto.


// Cor do filler (preenchimento):
c.fillStyle = 'rgba(255, 0, 0, 0.5)';

// Montando um retângulo (preto por padrão) na seguinte posição (lembrando que o eixo y nas...
// ... coordenadas do navegador aponta para baixo):
c.fillRect(100, 100, 100, 100);
// c.fillRect(x, y, width, height);

c.fillStyle = 'rgba(255, 0, 0, 0.1)';
c.fillRect(300, 500, 100, 100);

c.beginPath();
// Onde o está o ponto inicial:
c.moveTo(50, 300);
// Criando linha do ponto incial até outro pixel:
c.lineTo(300, 100);
// Criando linha do ponto incial até outro pixel:
c.lineTo(400, 100);

// Definindo a cor da linha:
c.strokeStyle = "#1AFF";
// Desenha a linha com um determinado estilo:
c.stroke();

// Obs.: note que stroke realiza um contorno e fill um preenchimento.

// Para criar objetos separados é necessário um novo "Path" (caso...
// ... contrário, neste caso uma linha iria conectar-se com o objeto seguinte):
c.beginPath();

c.fillStyle = 'rgba(255, 180, 220, 0.8)';

// Criando um circulo ou arco:
c.arc(700, 500, 100, 0, Math.PI * 2, false);
// c.stroke();
c.fill();

// Criando vários objetos por meio de um for-loop:
for(var i = 0; i < 10; i++){
    // Variável com número aletatório entre 0 e 1:
    var random_num = Math.random();
    c.beginPath();
    c.arc(600 + i * 25, window.innerHeight*random_num, 50, 0, Math.PI * 2, false);
    // Como mudar a cor com uma variável com 'i'? Tem que transformar a variável em string?
    c.stroke();
}

console.log(canvas);