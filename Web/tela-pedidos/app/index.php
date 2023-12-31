<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Icon-->
    <link rel="shortcut icon" href="../assets/img/CyberBurguerLogoSmall.png" type="image/x-icon">
    <!--CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Tela de pedidos</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1>Acompanhe o seu pedido aqui</h1>
                    <div class="row">
                        <div class="col-6" style="background-color: #0C75F7;">
                            <h2>Preparando</h2>
                        </div>
                        <div class="col-6" style="background-color: #E000C2;">
                            <h2>Pronto</h2>
                        </div>
                        <div class="col-6 nPedido container">
                            <div class='row'  id='pedidosPreparo'>
                               
                            </div>
                           <!-- <ul class="row"  id="pedidosPreparo">
                                <li class="col-6 numPedido"></li>
                            </ul>-->
                           
                        </div>
                        <div class="col-6 nPedido container">
                           <!-- <ul class="row" id="pedidosPronto">
                                <li class="col-6 numPedido" id=""></li>
                            </ul>-->
                            <div class='row'  id='pedidosPronto'>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 imgArea">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../assets/img/DarkBurguerAnuncio.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/img/1.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/img/2.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/img/3.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <!--Script Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

        
<script>
document.addEventListener('DOMContentLoaded', function () {
  function fetchPedidosEmPreparo() {
    fetch('../app/PHP/list_preparando.php')
      .then(response => response.json())
      .then(data => {
        const preparoElement = document.getElementById('pedidosPreparo');
        preparoElement.innerHTML = '';
        if (data.pedidos.length > 0) {

          data.pedidos.forEach(pedido => {
              const listItem = document.createElement('div');
              listItem.classList.add('col-6', 'pedido')
              listItem.textContent = pedido.comanda;
              preparoElement.appendChild(listItem);
          });
        }
      });
  }

  function fetchPedidosProntos() {
    fetch('../app/PHP/list_pronto.php')
      .then(response => response.json())
      .then(data => {
        console.log(data);
        // Limpe o conteúdo existente
        const prontoElement = document.getElementById('pedidosPronto');
        prontoElement.innerHTML = '';
        // Verifique se há pedidos prontos
        if (data.pedidos.length > 0) {
          const horaAtual = new Date();
          data.pedidos.forEach(pedido => {
            const listItem = document.createElement('div');
            listItem.textContent = pedido.comanda;
            listItem.classList.add('col-6', 'pedido')
            listItem.classList.add('pedido-item'); // Adiciona a classe CSS
            prontoElement.appendChild(listItem);
            listItem.classList.add('pedido-item', 'changing-color');
            setTimeout(() => {
              listItem.classList.remove('changing-color');
            }, 3000);
          });
        }
      });
  }

  setInterval(fetchPedidosEmPreparo, 10000); // Atualiza a cada 10 segundos
  setInterval(fetchPedidosProntos, 10000); // Atualiza a cada 10 segundos
});
</script>
</body>
</html>