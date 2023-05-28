//Confirmação de cancelamento

const btnCancel = document.querySelectorAll('.btnCancel')
const popUp = document.querySelector('.popUp')
const fundoOpaco = document.querySelector('.opaco')
const inputPedido = document.querySelector('.inputPedido')

const numPedido = document.querySelectorAll('.numPedido')

for(var i = 0; i < btnCancel.length; i++){
        (function(index) {
        btnCancel[index].addEventListener("click", function() {
          popUp.classList.remove('popDown');
          fundoOpaco.classList.remove('popDown');

          inputPedido.value = numPedido[index].textContent;
        });
      })(i);
}