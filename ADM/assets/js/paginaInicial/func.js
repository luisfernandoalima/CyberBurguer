var res = document.querySelectorAll('.res')
for (var i = 0; i < res.length; i++) {
    res[i].addEventListener('mouseover', function () {
        this.classList.add('hover');
    });

    // Adiciona o evento mouseout às células
    res[i].addEventListener('mouseout', function () {
        this.classList.remove('hover');
    });
}


//Copiar texto
const textoParaCopiar = document.querySelectorAll('.res');

function copiarTexto(texto) {
    const elementoTemporario = document.createElement('textarea');
    elementoTemporario.value = texto;
    document.body.appendChild(elementoTemporario);
    elementoTemporario.select();
    document.execCommand('copy');
    document.body.removeChild(elementoTemporario);
    alert('Texto copiado: ' + texto);
}

for (var i = 0; i < textoParaCopiar.length; i++) {
    (function (index) {
        textoParaCopiar[index].addEventListener('click', function () {
            copiarTexto(textoParaCopiar[index].textContent);
        });
    })(i);
}


const informaçõesImportantes = document.querySelectorAll('.importantInfo');

for (var i = 0; i < informaçõesImportantes.length; i++) {
    (function (index) {
        informaçõesImportantes[index].addEventListener('click', function () {
            copiarTexto(informaçõesImportantes[index].textContent);
        });
    })(i);
}

//voltar
const btnVoltar = document.querySelector('#backButton')

function voltar() {
    window.history.back();
}

btnVoltar.addEventListener('click', voltar)