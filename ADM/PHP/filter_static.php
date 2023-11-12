<!-- ... (código HTML anterior) ... -->

<h2>Total de vendas:</h2>
<span>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifique se o campo "selectData" foi definido no formulário
        if (isset($_POST['selectData'])) {
            $selectedValue = $_POST['selectData'];

            if ($selectedValue == '1') {
                $sql_diario = "SELECT * FROM venda WHERE data = '$diario'";
                $result_diario = mysqli_query($sql, $sql_diario);

                // Verifica se há algum erro na consulta diária
                if (!$result_diario) {
                    die("Erro na consulta diária: " . mysqli_error($sql));
                }

                // Armazena todos os pedidos diários em uma variável
                $pedidos_diarios = mysqli_fetch_all($result_diario, MYSQLI_ASSOC);

                // Conta a quantidade de pedidos diários
                $qtdPedidos = count($pedidos_diarios);
                echo $qtdPedidos;
            } elseif ($selectedValue == '2') {
                // Faça algo quando o valor for igual a 2
                $sql_semanal = "SELECT * FROM venda WHERE data = '$semanal'";
                $result_semanal = mysqli_query($sql, $sql_semanal);

                // Verifica se há algum erro na consulta semanal
                if (!$result_semanal) {
                    die("Erro na consulta semanal: " . mysqli_error($sql));
                }

                // Armazena todos os pedidos semanais em uma variável
                $pedidos_semanais = mysqli_fetch_all($result_semanal, MYSQLI_ASSOC);

                // Conta a quantidade de pedidos semanais
                $qtdPedidos = count($pedidos_semanais);
                echo $qtdPedidos;
            }
        }
    }
    ?>
</span>

<!-- ... (código HTML posterior) ... -->
