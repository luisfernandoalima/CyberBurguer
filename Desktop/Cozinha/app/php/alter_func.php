<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();


if (!isset($_SESSION['emailSession']) and !isset($_SESSION['senhaSession'])) {
    header("location: ../../index.php?erro=true");
    exit;
}


if (isset($_POST['submitAlter'])) {
    // Recupere os dados do formulário
    $novoNome = $_POST['nomePessoal'];
    $novoTelefone = $_POST['telPessoal'];
    $novoHabilitado = $_POST['habPessoal'];
    $novoReligiao = $_POST['relPessoal'];
    $novoConta = $_POST['conPessoal'];
    $novaSenha = base64_encode($_POST['senhaPessoal']);

    // Inclua o arquivo de conexão
    require_once(__DIR__ . '/../php/conn/conn.php');

    // Recupere as informações do banco de dados
    $id_func = $_SESSION['idFuncSession'];
    $query = "SELECT nome, religiao, tel, conta_bancaria, habilitado FROM funcionarios WHERE id_func = $id_func";
    $result = mysqli_query($sql, $query);
    $row = mysqli_fetch_assoc($result);

    // Compare os campos do formulário com as informações do banco de dados
    $updateFields = array();
    if ($novoNome != $row['nome']) {
        $updateFields[] = "nome = '$novoNome'";
    }
    if ($novoReligiao != $row['religiao']) {
        $updateFields[] = "religiao = '$novoReligiao'";
    }
    if ($novoTelefone != $row['tel']) {
        $updateFields[] = "tel = '$novoTelefone'";
    }
    if ($novoConta != $row['conta_bancaria']) {
        $updateFields[] = "conta_bancaria = '$novoConta'";
    }
    if ($novoHabilitado != $row['habilitado']) {
        $updateFields[] = "habilitado = '$novoHabilitado'";
    }
    if (!empty($novaSenha)) {
        $updateFields[] = "senha_adm = '$novaSenha'";
    }

    // Construa a consulta SQL de atualização
    if (!empty($updateFields)) {
        $updateQuery = "UPDATE funcionarios SET " . implode(', ', $updateFields) . " WHERE id_func = $id_func";

        // Execute a consulta
        if (mysqli_query($sql, $updateQuery)) {
            // Atualize as variáveis de sessão com os novos valores
            $_SESSION['nomeSession'] = $novoNome;
            $_SESSION['religiaoSession'] = $novoReligiao;
            $_SESSION['telefoneSession'] = $novoTelefone;
            $_SESSION['contaSession'] = $novoConta;
            $_SESSION['habilitadoSession'] = $novoHabilitado;
            $_SESSION['senhaSession'] = $novaSenha;
            // Redirecione para a página de informações com uma mensagem de sucesso
            
        echo '<script>alert("Informações modificadas com sucesso.");';
        echo 'window.location.href="../pagina-inicial/configuracoes/informacoes-pessoais/infos.php";</script>';
        exit;
           
        } else {
            // Trate erros de atualização
            echo "Erro ao atualizar as informações: " . mysqli_error($sql);
        }
    }
}
?>

