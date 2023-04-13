const dtAdimissao = () =>{
    const myDate = new Date().toLocaleDateString();

    const inputData = document.querySelector('#adimi_func')

    inputData.value = myDate

    
}