<?php
include_once('conn.php');
if(!empty($_GET['id_func'])){
    $id = $_GET['id_func'];
    $nomeUser = $_GET['nomeuser'];
    $celular = $_GET['celular']; //Achar um jeito de confirmar se o tamanho do numero é de fato 13 posições
    $hab = $_GET['hab'];
    $religiao = $_GET['reli'];
    $contBanc = $_GET['contabanc'];
    $senha = base64_encode($_GET['senha']);
    $confSenha = base64_encode($_GET['confsenha']);
    //Imagem bugada
    /*$uploadAvatar = "imgbd/avatar/";
    echo "<br/>";
    echo $uploadAvatar;
    echo "<br/>";
    $arquivoAvatar = $_FILES["Avatarimg"]["name"];
    echo "<br/>";
    echo $arquivoAvatar;
    echo "<br/>";
    $separaAvatar = explode(".", $arquivoAvatar);
    echo "<br/>";
    echo $separaAvatar;
    echo "<br/>";
    $separaAvatar = array_reverse($separaAvatar);
    echo "<br/>";
    echo $separaAvatar;
    echo "<br/>";
    $tipoAvatar = $separaAvatar[0];
    echo "<br/>";
    echo $tipoAvatar;
    echo "<br/>";
    $imgAvatar = $nomeUser. '.' . $tipoAvatar;
    echo "<br/>";
    echo $imgAvatar;
    echo "<br/>";
    if (move_uploaded_file($_FILES['Avatarimg']['tmp_name'], '../../' . $uploadAvatar . $imgAvatar)) {
        $uploadfileAvatar = $uploadAvatar . $imgAvatar;        
    }else{
        echo '<script>alert("Erro: falha no upload da imagem!");</script>'; 
    }
    */
    if ($senha == $confSenha){
        $edit = $sql->query("SELECT * FROM funcionarios WHERE id_func =$id");
        if($edit->num_rows > 0){
            $user_dados = mysqli_fetch_assoc($edit);                                                                                                                           
                $edit = ("UPDATE funcionarios SET nome = '$nomeUser', religiao = '$religiao', tel = '$celular', conta_bancaria = '$contBanc', habilitado = '$hab' , senha_adm = '$senha' WHERE id_func = '$id'");
                $resultado = $sql->query($edit);
                echo'<script>alert(" Informações do usuario de nome:'. $nomeUser . ' ATUALIZADA com sucesso !");</script>';
               }else{
                echo '<script>alert("usuario não encontrado, em caso de erro consulte o adiminstrador do sistema"); </script>';
            }
    }else{
        echo '<script>alert("As Senhas não batem!, confirme sua senha corretamente!"); </script>';
    }

    }

?>