<?php
include_once('conn.php');
if(!empty($_GET['mesa'])){
    $id = $_GET['mesa'];
    $edit = $sql->query("SELECT * FROM mesas WHERE mesa =$id");
    if($edit->num_rows > 0){
        $user_dados = mysqli_fetch_assoc($edit);
        {
            $deletar = $sql->query("DELETE FROM mesas WHERE mesa = $id ");
            echo '<script>alert("Mesa Nº'. $id . ' DELETADA com sucesso !"); window.location.href = "../app/pagina-inicial/controle-de-mesas/controle_mesas.php"</script>';
        }
    }else{
        echo '<script>alert("Mesa não encontrada, em caso de erro consulte o adiminstrador do sistema"); window.location.href = "../app/pagina-inicial/controle-de-mesas/controle_mesas.php"</script>';
    }
    echo '<script>alert("Mesa não encontrada, em caso de erro consulte o adiminstrador do sistema"); window.location.href = "../app/pagina-inicial/controle-de-mesas/controle_mesas.php"</script>';
}
?>