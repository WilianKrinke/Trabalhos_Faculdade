<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
if ((!isset($_SESSION['userName']) == true) and (!isset($_SESSION['isAdm']) == true)) {
    unset($_SESSION['userName']);
    unset($_SESSION['isAdm']);
    header('Location: ../../home/php');
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../utils//global_css//globalCss.css">
    <link rel="stylesheet" href="../../utils//global_css/links.css">
    <link rel="stylesheet" href="../../utils//global_css//buttons.css">
    <link rel="stylesheet" href="../css//devolverProduto.css">
    <title>Programação Web - PUC-Pr</title>
</head>

<body>
    <header>
        <div class="title_welcome">
            <div>
                <h1 class="title">Confirmação de Devolução</h1>
            </div>
            <div>
                <?php
                if ($_SESSION['isAdm'] == 1) {
                    echo "<p>Administrador(a) " . $_SESSION['userName'] . " </p> ";
                } else {
                    echo "<p>Bem-vindo(a) " . $_SESSION['userName'] . " </p> ";
                }
                ?>
            </div>
        </div>
        <nav>
            <ul>
                <?php
                if ($_SESSION['isAdm'] == 0) {
                    echo '
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/listaProdutos/php/">Lista de Produtos</a></li>
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/minhaLista/php/">Minha Lista</a></li>
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/meusDados/php/">Meus Dados</a></li>
                    ';
                } else if ($_SESSION['isAdm'] == 1) {
                    echo '                    
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/listaProdutos/php/">Lista de Produtos</a></li>
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/minhaLista/php/">Minha Lista</a></li>
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/srccadastroDeProdutos/php/">Cadastro de Produtos</a></li>
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/srccadastroUsuario/php/">Cadastro de Usuários</a></li>
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/meusDados/php/">Meus Dados</a></li>
                    <li><a href="../../listaDeUsuarios/php/">Lista de Usuários</a></li>
                    ';
                }
                ?>

            </ul>
        </nav>
        <form action="../../utils//logout.php" method="get">
            <button type="submit" class="logout_btn">Sair</button>
        </form>
    </header>
    <main class="display_flex_col">
        <section class="display_flex_col">
            <article class="card_lend">
                <div class="container_product_info">
                    <?php
                    $productName = $_GET['product_name'];
                    echo "<p>Confirmar a devolução do item <strong>&quot$productName&quot</strong> ?</p>";
                    ?>
                </div>
                <div class="container_confirmation">
                    <a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/minhaLista/php/" class="links">Cancelar</a>

                    <form action="#" method="post">
                        <?php

                        $userId = $_SESSION['userId'];
                        $idOperation = $_GET['operation'];
                        $idProduct = $_GET['product_id'];

                        echo "                            
                            <input type='hidden' value='$userId' name='idUser'>
                            <input type='hidden' value='$idOperation' name='idOperation'>
                            <input type='hidden' value='$idProduct' name='idProduct'>
                             "
                        ?>
                        <button type="submit" class="atualizar_btn">Confirmar</button>
                    </form>
                </div>
            </article>
            <?php
            include_once('./devolution.php');

            $productDevolutionDatas = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if ($productDevolutionDatas != null) {
                $wasReturned = devolution($productDevolutionDatas);

                if ($wasReturned['devolution'] == true) {
                    echo $wasReturned['message'];
                    header('location: ../../minhaLista/php/index.php');
                    die();
                } else {
                    echo $wasReturned['message'];
                }
            }
            ?>
            <p class='done'><span></span></p>
        </section>
    </main>

</body>

</html>