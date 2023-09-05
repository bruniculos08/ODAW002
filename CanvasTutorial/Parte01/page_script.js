// console.log('r/place');
// A seguinte variável receberá a primeira ocorrência do elemento <canvas>:
var canvas = document.querySelector('canvas');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// A variável 'c' será um objeto de contexto 2d (basicamente um objeto...
// ... que servirá para realizar os desenhos):
var c = canvas.getContext('2d');
// Obs.: por padrão, a variável c em canvas sempre se refere à contexto.


// Montando um retângulo (preto por padrão) na seguinte posição (lembrando que o eixo y nas...
// ... coordenadas do navegador aponta para baixo):
var x = 100
var y = 100
var width = 100
var height = 100
c.fillRect(x, y, width, height);
console.log(canvas);