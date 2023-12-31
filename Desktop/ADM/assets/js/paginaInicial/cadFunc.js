const formulariojs = () =>{
    const myDate = new Date().toLocaleDateString();

    const inputData = document.querySelector('#adimi_func')

    inputData.value = myDate
}

var cpfInput = document.querySelector('.cpfInput')
var cpfInput = IMask(cpfInput, {
    mask: '000.000.000-00'
});