var options = document.querySelector('#options');
var opções= document.querySelector(".opcoes")
var optionsMenu = document.querySelector('.optionsMenu');


opções.addEventListener("click", (e)=>{
        optionsMenu.classList.toggle('disable')
        opções.classList.toggle('opcoesAble')
})

var div1 = document.querySelector('.mesa');
var div2 = document.querySelector('.info');

div1.addEventListener('mouseover', function() {
  div2.style.left = div1.offsetWidth + 'px';
  div2.style.top = div1.offsetTop + 'px';
  div2.style.left = 'auto';
  div2.style.marginLeft = '160px'
});

div1.addEventListener('mouseout', function() {
        div2.style.left = '-9999px';
      });