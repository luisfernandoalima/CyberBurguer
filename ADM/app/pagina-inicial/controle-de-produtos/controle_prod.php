<?php
include(__DIR__ . '/../../../PHP/conn.php');
session_start(); 
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha'])) == true){ //Se as variaveis de sessão estiverem vazias, fecha a sessão e joga para a pagina de login
    unset($_SESSION['email']); //destroi a variavel sessão email
    unset($_SESSION['senha']); //destroi a variavel sessão senha
    header('location: ../../../index.html'); //joga para a pagina de login
}
$log = $_SESSION['email']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do email do usuario
$nomeFunc = $_SESSION['nome']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do  nome do usuario
$idFunc = $_SESSION['id_func']; //pega informações atraves da sessão e coloca ela em uma variavel, no caso a informação do id do usuario
// Explode o nome completo em partes separadas por espaço
$parts = explode(" ", $nomeFunc); //usado para separar o nome do primeiro nome 
// Pega o primeiro elemento do array resultante
$primeiroNome = $parts[0];
// Explode o nome completo em partes separadas por espaço
//FIM codigo relacionado a sessão
$avatar = '../../../../imgbd/' . $_SESSION['avatarSession'];

if (!empty($dados)) {
    $sqla = "SELECT * FROM produto WHERE prod LIKE '%$dados%' AND status ='ATIVO'";
    $sqlb = "SELECT * FROM burguer WHERE prod LIKE '%$dados%' AND status ='ATIVO'";
    $sqlc = "SELECT * FROM bebida WHERE prod LIKE '%$dados%' AND status ='ATIVO'";
    $sqld = "SELECT * FROM acompanhamento WHERE prod LIKE '%$dados%' AND status ='ATIVO'";
    $sqle = "SELECT * FROM fornecedor WHERE prod LIKE '%$dados%'";
    $sqlf = "SELECT * FROM molho WHERE prod LIKE '%$dados%' AND status ='ATIVO'";
    $sqlg = "SELECT * FROM sobremesa WHERE prod LIKE '%$dados%' AND status ='ATIVO'";
} else {
    $sqla = "SELECT * FROM produto WHERE status ='ATIVO'";
    $sqlb = "SELECT * FROM burguer WHERE status ='ATIVO'";
    $sqlc = "SELECT * FROM bebida WHERE status ='ATIVO'";
    $sqld = "SELECT * FROM acompanhamento WHERE status ='ATIVO'";
    $sqle = "SELECT * FROM fornecedor";
    $sqlf = "SELECT * FROM molho WHERE status ='ATIVO'";
    $sqlg = "SELECT * FROM sobremesa WHERE status ='ATIVO'";
}
$produtosinfo = $sql->query($sqla);
$burguerinfo = $sql->query($sqlb);
$bebidainfo = $sql->query($sqlc);
$acompanhamentoinfo = $sql->query($sqld);
$fornecedorinfo = $sql->query($sqle);
$molhosinfo = $sql->query($sqlf);
$sobremesainfo = $sql->query($sqlg);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../assets/img/icons/CyberBurguerLogoSmall.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/menu.css">
    <link rel="stylesheet" href="../../../assets/css/paginaInicial/cont-func.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b95d68622e.js" crossorigin="anonymous"></script>
    <!--Material Symbols Outlined-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Controle de produtos</title>
</head>

<style>
    .searchArea {
        margin-top: 5px;
    }

    #tabelaProdutos {
        width: 90%;
        margin: auto;
    }

    .tabela {
        height: 300px;
    }

    .labelFiltro {
        display: block;
        padding-left: 5%;
        margin-left: 10%;
        width: 80%;
        border-radius: 15px;
        cursor: pointer;
        transition: .3s;
    }

    .radioButton{
        display: none;
    }

    .labelFiltro:hover{
        background-color: #dbdbdb;
    }
</style>

<body>
    <div class="fundo">
        <aside class="sidebar">
            <nav>
                <a href="../../pagina-inicial/home.php">
                    <button class="active">
                        <span>
                            <i class="material-symbols-outlined">home</i>
                            <span>Home</span>
                        </span>
                    </button>
                </a>

                <a href="../../mesas/home_mesa.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">table_restaurant</i>
                            <span>Mesas</span>
                        </span>
                    </button>
                </a>

                <a href="../../estoque/estoque.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">inventory</i>
                            <span>Estoque</span>
                        </span>
                    </button>
                </a>

                <a href="../../estatisticas/estatisticas.php">
                    <button>
                        <span>
                            <i class="material-symbols-outlined">paid</i>
                            <span>Estatísticas</span>
                        </span>
                    </button>
                </a>
            </nav>

            <header class="sidebar-header">
                <!--Foto Usuário-->
                <img class="logo-img" src="<?php echo $avatar; ?>" alt="Foto do usuário">
                <span class="dados">
                    <!--Nome do Usuário-->
                    <span class="nome"><?php echo $primeiroNome ?></span>
                    <br>
                    <!--Número de identificação-->
                    <span class="id">#<?php echo $idFunc ?></span>
                </span>
                <span id="options">
                    <span class="opcoes">
                        <div class="optionsMenu disable">
                            <div class="itemList">
                                <a href="../../meu-perfil/index.php"><i
                                        class="material-symbols-outlined">settings</i><span>Configurações</span></a>
                            </div>
                            <hr class="menuLinha">
                            <p><a href="">Sair da conta</a></p>
                        </div>
                        <span class="ball"></span>
                        <span class="ball"></span>
                        <span class="ball"></span>
                    </span>
                </span>
            </header>
        </aside>

        <!--Principal-->
        <main class="main">
            <div class="header">
                <div><i class="material-symbols-outlined">badge</i><span>Controle de Produtos</span></div>
            </div>
            <hr>
            <div class="mainArea">
                <div class="container">
                    <label for="cat_prod">Categoria:</label><br>
                    <select name="cat_prod" id="cat_prod">
                        <option value="1">Produtos</option>
                        <option value="2">Hamburguer</option>
                        <option value="3">Bebida</option>
                        <option value="4">Acompanhamento</option>
                        <option value="5">Fornecedor</option>
                        <option value="6">molhos</option>
                        <option value="7">sobremesa</option>
                    </select>
                </div>



                <!--Barra de Pesquisa-->
                <div class="searchArea">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-10">
                            <input type="text" name="search" placeholder="Pesquisar..." class="searchBar" id="search" />

                            </div>
                            <div class="col-2">
                                <button class="searchButton" id="searchButton">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- índice da tabela de produto-->
                <div id="tabelaProdutos" class="tabela">
                    <table>
                        <thead>
                            <th class="id">Id</th>
                            <th>Lote</th>
                            <th>Tipo</th>
                            <th>Produto</th>
                            <th>Preço da compra</th>
                            <th>Preço da venda</th>
                            <th>Quantidade</th>
                            <th>Data da compra</th>
                            <th>Data de vencimento</th>
                            <th>Excluir</th>
                        </thead>
                <!--Conteudo da tabela de produtos-->
                                <?php foreach($produtosinfo AS $produtosinfo2): ?>
                            <tbody id="p">
                            <tr>
                            <?php $id_prod = $produtosinfo2['id_prod'];?>
                                <td class="id"><?php echo $produtosinfo2['id_prod']; ?></td>
                                <td> <?php echo $produtosinfo2['lote']; ?> </td>
                                <td> <?php echo $produtosinfo2['tipo']; ?> </td>
                                <td> <?php echo $produtosinfo2['prod']; ?> </td>
                                <td> <?php echo $produtosinfo2['preco_compra']; ?> </td>
                                <td> <?php echo $produtosinfo2['preco_venda']; ?> </td>
                                <td class="<?php echo ($produtosinfo2['qtd'] <= 10) ? 'baixa-quantidadeTb' : ''; ?>"><?php echo $produtosinfo2['qtd']; ?><?php if ($produtosinfo2['qtd'] <= 10): ?> (Baixa quantidade) <?php endif; ?></td>
                                <td> <?php echo $produtosinfo2['dta_compra']; ?> </td>
                                <td class="<?php echo (strtotime($produtosinfo2['dta_vencimento']) <= strtotime(date('Y-m-d'))) ? 'vencido' : ''; ?>">
                                    <?php echo $produtosinfo2['dta_vencimento']; ?>
                                    </td>                                                           
                                <?php echo  "<td class='moreOptions'> <a href='../../../PHP/alter_prod.php?id_prod=$id_prod'; <i class='fa-solid fa-x' style='color: #ffffff;'></i></a></td>"?>
                            </tr>                           
                        </tbody>
                        <?php endforeach; ?>                         
                    </table>
                </div>
                    <!--índice da tabela hamburguer-->
                <div id="tabelaHamburguer" class="tabela">
                    <table>
                        <thead>
                            <th class="id">Id</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Excluir</th>
                           
                        </thead>
                        <tbody>
                            <!--Conteúdo da tabela hamburguer-->
                        <?php foreach($burguerinfo AS $burguerinfo2): ?>
                            <tr>
                            <!--olha ta dando erro pq ele ta tentando pegar um dado q nem foi executado-->
                            <?php $id_burguer = $burguerinfo2['id_burguer'];?>
                                <td class="id"><?php echo $burguerinfo2['id_burguer']; ?></td>
                                <td><?php echo $burguerinfo2['nome']; ?></td>
                                <td><?php echo $burguerinfo2['preco']; ?></td>

                                <?php echo  "<td class='moreOptions'> <a href='../../../PHP/alter_burguer.php?id_burguer=$id_burguer'; <i class='fa-solid fa-x' style='color: #ffffff;'></i></a></td>"?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!--índice da tabela bebidas-->
                <div id="tabelaBebidas" class="tabela">
                    <table>
                        <thead>
                            <th class="id">Id</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Excluir</th>
                        </thead>
                        <tbody>
                            <!--conteúdo da tabela bebidas-->
                        <?php foreach($bebidainfo AS $bebidainfo2): ?>
                            <tr>
                            <?php $id_bebida = $bebidainfo2['id_bebida'];?>
                                <td class="id"> <?php echo $bebidainfo2['id_bebida']; ?> </td>
                                <td>  <?php echo $bebidainfo2['nome']; ?> </td>
                                <td>  <?php echo $bebidainfo2['preco']; ?> </td>
                                <td class="<?php echo ($produtosinfo2['qtd'] <= 10) ? 'baixa-quantidadeTb' : ''; ?>"><?php echo $produtosinfo2['qtd']; ?><?php if ($produtosinfo2['qtd'] <= 10): ?> (Baixa quantidade) <?php endif; ?></td>

                                <?php echo  "<td class='moreOptions'> <a href='../../../PHP/alter_bebida.php?id_bebida=$id_bebida'; <i class='fa-solid fa-x' style='color: #ffffff;'></i></a></td>"?>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
                <!--índice da tabela acompanhamentos-->
                <div id="tabelaAcompanhamento" class="tabela">
                    <table>
                        <thead>
                            <th class="id">Id</th>
                            <th>Nome</th>
                            <th>Preço</th>                      
                            <th>Excluir</th>
                        </thead>
                        <tbody>
                            <!--conteúdo da tabela acompanhamentos-->
                        <?php foreach($acompanhamentoinfo AS $acompanhamentoinfo2): ?>
                            <tr>



                            <?php $id_acompanhamento = $acompanhamentoinfo2['id_acompanhamento'];?>
                                <td class="id"><?php echo $acompanhamentoinfo2['id_acompanhamento']; ?></td>
                                <td><?php echo $acompanhamentoinfo2['nome']; ?></td>
                                <td><?php echo $acompanhamentoinfo2['preco']; ?></td>
        
                                <?php echo  "<td class='moreOptions'> <a href='../../../PHP/alter_acompanhamento.php?id_acompanhamento=$id_acompanhamento'; <i class='fa-solid fa-x' style='color: #ffffff;'></i></a></td>"?>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
                <!--índice da tabela fornecedor-->
                <div id="tabelaFornecedor" class="tabela">
                    <table>
                        <thead>
                            <th>CNPJ</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Tipo</th>
                        </thead>
                        <tbody>
                              <!--conteúdo da tabela fornecedor-->
                        <?php foreach($fornecedorinfo AS $fornecedorinfo2): ?>
                            <tr>
                                <td class="id"> <?php echo $fornecedorinfo2['cnpj'];?> </td>
                                <td><?php echo $fornecedorinfo2['nome']; ?></td>
                                <td><?php echo $fornecedorinfo2['tel']; ?></td>
                                <td><?php echo $fornecedorinfo2['tipo']; ?></td>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
                    <div id="tabelaMolhos" class="tabela">
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Excluir</th>
                           
                        </thead>
                        <tbody>
                              <!--conteúdo da tabela molhos-->
                        <?php foreach($molhosinfo AS $molhosinfo2): ?>
                            <tr>
                            <?php $id_molhos = $molhosinfo2['id_molho'];?>
                                <td class="id"> <?php echo $molhosinfo2['id_molho'];?> </td>
                                <td><?php echo $molhosinfo2['nome']; ?></td>
                                <?php echo "<td class='moreOptions'> <a href='../../../PHP/alter_molhos.php?id_molhos=$id_molhos'; <i class='fa-solid fa-x' style='color: #ffffff;'></i></a></td>"?>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>

                
                <!--índice da tabela molhos-->
                <div id="tabelaSobremesas" class="tabela">
                    <table>
                        <thead>
                            <th class= "id">ID</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Excluir</th>       
                        </thead>
                        <tbody>
                              <!--conteúdo da tabela molhos-->
                       <?php foreach($sobremesainfo AS $sobremesainfo2): ?>
                            <tr>
                            <?php $id_sobremesa = $sobremesainfo2['id_sobremesa'];?>
                                <td class="id"> <?php echo $sobremesainfo2['id_sobremesa'];?> </td>
                                <td><?php echo $sobremesainfo2['nome']; ?></td>
                                <td><?php echo $sobremesainfo2['preco']; ?></td>
                                <?php echo  "<td class='moreOptions'> <a href='../../../PHP/alter_sobremesa.php?id_sobremesa=$id_sobremesa'; <i class='fa-solid fa-x' style='color: #ffffff;'></i></a></td>"?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../../assets/js/paginaInicial/contProd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="../../../assets/js/paginaInicial/sidebar.js"></script>

    <style>
        .vencido {
        color: red;  /* Altere a cor conforme necessário */
        font-weight: bold;
    }
    .baixa-quantidade {
        color: yellow;
        font-weight: bold;
    }
    .baixa-quantidadeTb {
        font-weight: bold;
        color: yellow;
    }
    </style>

</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
        // Verifica se a data é vencida e substitui o conteúdo
        document.querySelectorAll('.vencido').forEach(function(cell) {
            cell.textContent = 'Produto Vencido';
        });
    });


</script>
</html>