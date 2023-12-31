/*Máscara para o CPF*/
var cpfInput = document.querySelector('.cpfInput')
var cpfInput = IMask(cpfInput, {
    mask: '000.000.000-00'
});

/*Máscara para o telefone*/
var telInput = document.querySelector('.telInput')
var telInput = IMask(telInput, {
    mask: '(00)00000-0000'
});

var CEP = document.querySelector('#CEP')
var CEP = IMask(CEP, {
    mask: '00000-000'
});


const limpa_formulário_cep = () => {
    document.querySelector('#CEP').value = ('')
    document.querySelector('#cidade').value = ('')
    ocument.querySelector('#Bairro').value = ('')
    document.querySelector('#Rua').value = ('')
    document.querySelector('#numero').value = ('')
}

const meu_callback= (conteudo) =>{
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('Bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('Rua').value=(conteudo.logradouro);
        document.getElementById('numero').focus()
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('Rua').value="...";
            document.getElementById('Bairro').value="...";
            document.getElementById('cidade').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};