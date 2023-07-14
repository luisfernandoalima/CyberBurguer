const nMesaGrande = document.querySelector('#nMesaGrande')
var nMesa = document.querySelector('#nMesa')


const nPessoasGrande = document.querySelector('#nPessoas')
var nPessoas = document.querySelector('#capMesa')

nMesa.addEventListener('change', () =>{
    nMesaGrande.innerHTML = nMesa.value
})

nPessoas.addEventListener('change', () =>{
    nPessoasGrande.innerHTML = nPessoas.value
})

var nPessoas = IMask(nPessoas, {
    mask: '000'
});