var options = document.querySelector('.opcoes');
var optionsMenu = document.querySelector('.optionsMenu');


options.addEventListener("click", (e)=>{
    if(optionsMenu.classList.contains('able') == true){
        optionsMenu.classList.remove ('able')
        optionsMenu.classList.add('disable')
        options.classList.toggle('opcoesAble')
    }else{
        optionsMenu.classList.add ('able')
        optionsMenu.classList.remove('disable')
        options.classList.toggle('opcoesAble')
    }
})
