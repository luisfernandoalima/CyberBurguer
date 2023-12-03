const horaCampos = document.querySelectorAll('.Hora');
const difHoraCampos = document.querySelectorAll('.difTempo');

const horaDiferente = () => {
    horaCampos.forEach((horaCampo, index) => {
        var horaSeparada = horaCampo.textContent.split(":");
        var horaAtual = new Date();
        
        // Crie um objeto de data para a hora especificada a partir do campo
        let horaCampoDif = new Date();
        horaCampoDif.setHours(parseInt(horaSeparada[0]));
        horaCampoDif.setMinutes(parseInt(horaSeparada[1]));
        
        // Verifique se a hora especificada é posterior à hora atual
        if (horaCampoDif > horaAtual) {
            // Se for posterior, adicione 24 horas ao objeto 'horaCampoDif'
            horaCampoDif.setHours(horaCampoDif.getHours() + 24);
        }
        
        // Calcula a diferença em minutos
        var diferencaEmMinutos = Math.floor((horaCampoDif - horaAtual) / (1000 * 60));
        
        var diferençaDeHorario = Math.abs(diferencaEmMinutos) 


        // Atualiza o campo 'difTempo' com a diferença em minutos
        difHoraCampos[index].textContent = diferençaDeHorario;
    });
}

horaDiferente();

setInterval(horaDiferente, 1000);
