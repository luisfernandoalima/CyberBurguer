<!DOCTYPE html>
<html>
<head>
    <title>Carregando...</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
    <img src="caminho_para_seu_gif.gif" alt="Carregando...">
    <script>
        // Redireciona após um tempo
        setTimeout(function() {
            window.location.href = "../app/pagina-inicial/home.php";
        }, 3000); // Tempo em milissegundos (3 segundos no exemplo)
    </script>
</body>
</html>
