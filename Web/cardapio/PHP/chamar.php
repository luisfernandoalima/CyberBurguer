<?php
include_once "conn.php";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo 'comanda1' foi preenchido
    if (!empty($_POST['comanda1'])) {
        $comanda = $_POST['comanda1'];
        
        $sql1 = "SELECT mesa FROM comandas where comanda = '$comanda'";
        $result = $conn->query($sql1);

        if ($result) {
            $mesaData = $result->fetch_assoc(); // Obtém os dados da primeira linha

            if ($mesaData) {
                $mesa = $mesaData['mesa'];

                // Atualiza o campo 'chamando' na tabela 'mesa' para 'SIM'
                $sql_update = "UPDATE mesas SET chamando = 'SIM' WHERE mesa = '$mesa'";
                $conn->query($sql_update);
                header("Location: ../html/garcom.html");
                exit(); 


            } else {
              
            }
        } else {
            
        }
    } else {
        
    }
} else {
  
   
}
?>