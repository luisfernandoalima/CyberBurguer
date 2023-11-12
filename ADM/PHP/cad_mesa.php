<?php
include_once('conn.php');

$num_mesa = $_POST['nMesa'];
$cap_mesa = $_POST['capMesa'];
$array1 = $sql->query("SELECT * FROM mesas WHERE mesa = '$num_mesa'");
$checar1 = mysqli_num_rows($array1);
if($checar1 == 1){
    echo '<script>alert("Mesa Nº'. $num_mesa . ' Já cadastrada !, Cadastre outra mesa ou consulte o ADM do sistema em caso de erro ");</script>';
}else{
    $sql->query("INSERT INTO mesas (mesa, qtdCadeiras) VALUES ($num_mesa, $cap_mesa)");
    echo '<script>alert("Mesa Nº'. $num_mesa . ' Cadastrada com sucesso! "); window.location.href = "../app/pagina-inicial/home.php";</script>';
}
?>