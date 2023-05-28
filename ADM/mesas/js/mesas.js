var options = document.querySelector('#options');
var opções= document.querySelector(".opcoes")
var optionsMenu = document.querySelector('.optionsMenu');


opções.addEventListener("click", (e)=>{
        optionsMenu.classList.toggle('disable')
        opções.classList.toggle('opcoesAble')
})















var mesa = document.querySelectorAll('.mesa');

var info = document.querySelectorAll('.info');
var mesaNome = document.querySelectorAll('.mesaNome');
var mesaEstado = document.querySelectorAll('.mesaEstado');
var mesaPedido = document.querySelectorAll('.mesaPedido');

var infoArea = document.querySelector('.infoArea')
var infoMesa = document.querySelector('#Mesa')
var infoEstado = document.querySelector('#Estado')
var infoPedido = document.querySelector('#Pedido')


for (let i = 0; i < mesa.length; i++) {
  mesa[i].addEventListener('mouseover', function() {
    infoMesa.textContent = mesaNome[i].textContent
    infoEstado.textContent = mesaEstado[i].textContent
    infoPedido.textContent = mesaPedido[i].textContent

    mesa[i].classList.add('hoverMesa')
  })

  mesa[i].addEventListener('mouseout', function() {
    mesa[i].classList.remove('hoverMesa')
  })
}


/*for(let i = 0; i <= div1.length; i++){
  div1[i].addEventListener('mouseover', function() {
    const left = this.offsetLeft + this.offsetWidth;
    const top = this.offsetTop;
    info[i].style.left = left + 'px';
    info[i].style.top = top + 'px';
    info[i].style.left = 'auto';
    console.log(info[i].style.marginLeft)


  });
  
  div1[i].addEventListener('mouseout', function() {
    info[i].style.left = '-9999px';
  });
}
*/




/*div1.addEventListener('mouseover', function() {
  info.style.left = div1.offsetWidth + 'px';
  info.style.top = div1.offsetTop + 'px';
  info.style.left = 'auto';
  info.style.marginLeft = '160px'
});

div1.addEventListener('mouseout', function() {
        info[i].style.left = '-9999px';
      });*/