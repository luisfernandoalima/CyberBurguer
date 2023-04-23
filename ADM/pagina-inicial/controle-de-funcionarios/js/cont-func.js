var tds = document.querySelectorAll('.moreOptions')
for (var i = 0; i < tds.length; i++) {
    tds[i].addEventListener('mouseover', function() {
        this.classList.add('hover');
    });

    // Adiciona o evento mouseout às células
    tds[i].addEventListener('mouseout', function() {
        this.classList.remove('hover');
    });
}