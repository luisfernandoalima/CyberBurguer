var res = document.querySelectorAll('.res')
for (var i = 0; i < res.length; i++) {
    res[i].addEventListener('mouseover', function() {
        this.classList.add('hover');
    });

    // Adiciona o evento mouseout às células
    res[i].addEventListener('mouseout', function() {
        this.classList.remove('hover');
    });
}