const html = document.querySelector('html')
const btnConfirm = document.querySelector('.btnSubmitJS')

/*Script para abilitar o botão de salvar*/
const inputForm = document.querySelectorAll('input[type="text"]')
const senhaP = document.querySelector('#senhaPessoal')

const ableConfirmBtn = () => {
    btnConfirm.disabled = false
}

for (var i = 0; i < inputForm.length; i++) {
    inputForm[i].addEventListener('change', ableConfirmBtn)
    console.log(inputForm[i])
}

/*Script para o salvamento da senha */
const inputSenha = document.querySelector('#senhaPessoal')
const divSenha = document.querySelector('.passwordClass')
const inputConfirmSenha = document.querySelector('#senhaConPessoal')

const mudarSenha = () => {
    divSenha.style.display = 'block'
    btnConfirm.disabled = false
}

inputSenha.addEventListener('change', mudarSenha)

/*Máscara para o telefone*/
var telefonePessoal = document.getElementById('telPessoal')
var telefonePessoal = IMask(telefonePessoal, {
    mask: '(00) 00000-0000'
});

/*Máscara para a conta bancária*/
var contaBancaria = document.getElementById('conPessoal')
var contaBancaria = IMask(contaBancaria, {
    mask: '000000-0'
});

/*Confirmação do salvamento de dados*/
const forms = document.querySelector('#infoPessoais')

const confirmSave = () => {

    if (divSenha.style.display != 'block') {
        inputConfirmSenha.value = inputSenha.value
        let result = confirm("Vc deseja salvar as alteraões realizadas? (Em caso de alguma informação que não condiz com a realidade ou não está de acordo com o protocólo do empregado, o usuário será cabível de punições.)")

        if (result) {
            forms.submit()
        } else {
            location.reload()
        }
    } else if (inputConfirmSenha.value == '' && inputSenha.value == '') {
        confirm('Não é possível salvar as informações com a senha vazia.')
        location.reload()
    } else if (inputSenha.value != inputConfirmSenha.value) {
        confirm('A informação inserida nos campos "Senha" e "Confirmar senha" devem ser iguais.')
        location.reload()
    } else {
        inputConfirmSenha.value = inputSenha.value
        let result = confirm("Vc deseja salvar as alteraões realizadas? (Em caso de alguma informação que não condiz com a realidade ou não está de acordo com o protocólo do empregado, o usuário será cabível de punições.)")

        if (result) {
            forms.submit()
        } else {
            location.reload()
        }
    }
}

btnConfirm.addEventListener('click', confirmSave)
