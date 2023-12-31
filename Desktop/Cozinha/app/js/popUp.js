//Confirmação de cancelamento

const btnCancel = document.querySelectorAll('.btnCancel')
const popUp = document.querySelector('.popUpDiv')
const fundoOpaco = document.querySelector('.opaco')
const inputPedido = document.querySelector('.inputPedido')

const numPedido = document.querySelectorAll('.numPedido')

for (var i = 0; i < btnCancel.length; i++) {
  (function (index) {
    btnCancel[index].addEventListener("click", function () {
      popUp.classList.remove('popDown');
      fundoOpaco.classList.remove('popDown');


      popUp.classList.remove('scale-out-center');
      fundoOpaco.classList.remove('fade-out')

      popUp.classList.add('scale-in-center')
      fundoOpaco.classList.add('fade-in')


      inputPedido.value = numPedido[index].textContent;
    });
  })(i);
}

//Fechar PopUp

const fecharPopUp = document.querySelector('.fecharPopUp')

const fecharPOP = () => {
  popUp.classList.remove('scale-in-center')
  
  fundoOpaco.classList.remove('fade-in')
  popUp.classList.add('scale-out-center')
  fundoOpaco.classList.add('fade-out')

  function disable() {
    if (popUp.classList.contains('scale-out-center')) {
      popUp.classList.add('popDown')
      fundoOpaco.classList.add('popDown')
    }
  }

  setTimeout(disable, 1000)
}

fecharPopUp.addEventListener("click", fecharPOP)
