var options = document.querySelector('#options');
var opções = document.querySelector(".opcoes")
var optionsMenu = document.querySelector('.optionsMenu');


opções.addEventListener("click", (e) => {
  optionsMenu.classList.toggle('disable')
  opções.classList.toggle('opcoesAble')
})

/*JS das mesas*/
const mesas = document.querySelectorAll('.mesaArea');
const info = document.querySelectorAll('.info');
var n = [5, 11, 17]

for (let i = 0; i < mesas.length; i++) {
  mesas[i].addEventListener('mouseover', (event) => {
    /*Pegar os valores da posição do mouse*/
    const mouseX = event.clientX;
    const mouseY = event.clientY;

    if (i == n[0] || i == n[1] || i == n[2]) {
      info[i].style.left = `${mouseX - 100}px`;
      info[i].style.top = `${mouseY - 100}px`;
    } else {
      info[i].style.left = `${mouseX + 10}px`;
      info[i].style.top = `${mouseY + 10}px`;
    }

  
    info[i].style.display = 'block';
  });

  mesas[i].addEventListener('mouseout', () => {
    info[i].style.display = 'none';
  });
}


const estado = document.querySelectorAll('.ocupaçãoMesa')
const fundoMesa = document.querySelectorAll('.fundoMesa')

//Mudar cor da mesa
const disponibilidade = () => {
  let c = 0
  while (c < mesas.length) {
    if (estado[c].innerHTML === 'Ocupada') {
      fundoMesa[c].style.backgroundColor = '#FF0000';
    }
    c++;
  }
}

//Realiza a função a cada 0.5 segundo
setInterval(disponibilidade, 500)