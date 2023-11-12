//Menu de configurações

const menuCheckBox = document.querySelector('#checkbox-menu')


const menuHamburguer = () => {

  const menuConfig = document.querySelector('.menuConfig')

  if (menuCheckBox.checked == true){
    menuConfig.style.display = "block";
  } else {
    menuConfig.style.display = 'none'
  }
 
}

menuCheckBox.addEventListener('change', menuHamburguer)