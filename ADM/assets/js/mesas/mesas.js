var options = document.querySelector('#options');
var opções = document.querySelector(".opcoes")
var optionsMenu = document.querySelector('.optionsMenu');


opções.addEventListener("click", (e) => {
  optionsMenu.classList.toggle('disable')
  opções.classList.toggle('opcoesAble')
})



const mesas = document.querySelectorAll('.mesaArea');
const info = document.querySelectorAll('.info');

for (let i = 0; i < mesas.length; i++) {
  mesas[i].addEventListener('mouseover', (event) => {
    const mouseX = event.clientX;
    const mouseY = event.clientY;

    info[i].style.left = `${mouseX + 10}px`;
    info[i].style.top = `${mouseY + 10}px`;

    info[i].style.display = 'block';
  });

  mesas[i].addEventListener('mouseout', () => {
    info[i].style.display = 'none';
  });
}


const estado = document.querySelectorAll('.mesaEstado')
const fundoMesa = document.querySelectorAll('.fundoMesa')

const disponibilidade = () =>{
  let c = 0
  while(c < mesas.length){
    if (estado[c].innerHTML === 'Estado: Ocupada') {
      fundoMesa[c].style.backgroundColor = '#FF0000';
    }
    c++;
  }
}

setInterval(disponibilidade, 1000)