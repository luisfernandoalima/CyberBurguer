const filtroData = document.querySelector('.filtroData');
const selectData = document.querySelector('#selectData');

console.log('1');

filtroData.addEventListener('click', (e) => {
    selectData.size = selectData.options.length; // Expand the dropdown
    console.log('2');
});

// Restore the original size when clicking outside
document.addEventListener('click', (e) => {
    if (e.target !== selectData) {
        selectData.size = 1; // Restore original size
    }
});

const filtroVenda = document.querySelector('.filtroVenda');

// O restante do seu código vem aqui...
