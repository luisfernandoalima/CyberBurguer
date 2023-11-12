<?php
include_once('conn.php');
if(!empty($_GET['id_prod'])){
    $id = $_GET['id_prod'];
    $nomeProd = $_GET['nomeProd'];
    $loteProd = $_GET['loteProd'];
    $qtdProd = $_GET['qtdProd'];
    $dtaProd = $_GET['valProd'];
    $edit = $sql->query("SELECT * FROM produto WHERE id_prod =$id");
    if($edit->num_rows > 0){
        $user_dados = mysqli_fetch_assoc($edit);
        {
            $edit = ("UPDATE produto SET lote = '$loteProd', prod = '$nomeProd', qtd = '$qtdProd', dta_vencimento = '$dtaProd' WHERE id_prod = '$id'");
            $resultado = $sql->query($edit);
            echo'<script>alert(" Produto de Nome:'. $nomeProd . ' ATUALIZADA com sucesso !"); window.location.href = "../app/estoque/editar-estoque/editEstoque.php"</script>';
        }
    }else{
        echo '<script>alert("Produto não encontrado, em caso de erro consulte o adiminstrador do sistema"); window.location.href = "../app/estoque/editar-estoque/editEstoque.php"</script>';
    }
    echo '<script>alert("Produto não encontrada, em caso de erro consulte o adiminstrador do sistema"); window.location.href = "../app/estoque/editar-estoque/editEstoque.php"</script>';
}

?>