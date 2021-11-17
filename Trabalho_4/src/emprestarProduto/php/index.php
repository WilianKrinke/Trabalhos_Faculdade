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
    <link rel="stylesheet" href="../../utils//global_css//buttons.css">
    <link rel="stylesheet" href="../../utils//global_css//links.css">
    <link rel="stylesheet" href="../css/emprestarProduto.css">
    <title>Programação Web - PUC-Pr</title>
</head>

<body>
    <header class="display_flex_col">
        <h1>Confirmação de Empréstimo</h1>
        <nav class="container_list">
            <ul class="box_list">
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
                    <li><a href="../../listaDeUsuarios/php/">Lista de usuários</a></li>
                    ';
                }
                ?>
            </ul>
        </nav>
    </header>
    <main class="display_flex_col">
        <section class="display_flex_col">
            <article class="display_flex_col card_lend">
                <div class="display_flex_col container_product_info">
                    <?php
                    $oneWeekLater = time() + (7 * 24 * 60 * 60);

                    $todayLocalDate = date("d-m-Y");
                    $devolutionLocalDate = date("d-m-Y", $oneWeekLater);

                    echo "<p>O usuário " . $_SESSION['userName'] . " emprestará o produto: <strong>&quot" . $_GET['nome_produto'] . "&quot</strong>, no dia <strong>$todayLocalDate</strong>, com data de devolução para o dia <strong>$devolutionLocalDate</strong>.</p>";
                    ?>
                </div>
                <div class="display_flex_row container_confirmation">
                    <a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/listaProdutos/php/" class="links">Cancelar</a>

                    <form action="#" method="post">
                        <?php
                        $oneWeekLater = time() + (7 * 24 * 60 * 60);

                        //teste de um dia atrasado
                        $oneDay = time() + (60 * 60 * 24);

                        $userId = $_SESSION['userId'];
                        $idProduct = $_GET['id_product'];
                        $productName = $_GET['nome_produto'];
                        $db_todayDate = date("Y-m-d");
                        $db_devolutionDate = date("Y-m-d", $oneDay);

                        echo "
                            <input type='hidden' value='$userId' name='idUser'>
                            <input type='hidden' value='$idProduct' name='idProduct'>
                            <input type='hidden' value='$productName' name='productName'>
                            <input type='hidden' value='$db_todayDate' name='lendDate'>
                            <input type='hidden' value='$db_devolutionDate' name='devolutionDate'>
                        "
                        ?>
                        <button type="submit" class="atualizar_btn">Confirmar</button>
                    </form>
                </div>
            </article>
            <p class='done'></p>
            <?php
            require_once("./receiverDataLendProduct.php");
            $productLendData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if ($productLendData != null) {
                $wasSent = receiverDataLendProduct($productLendData);

                if ($wasSent['lendProduct'] == true) {
                    echo "<p class='done'>Item emprestado, verifique a aba minha lista</p>";
                    header("location: ../../minhaLista/php/index.php");
                    die();
                } else {
                    echo "<p class='alert'>Erro: Contate o desenvolvedor responsável</p>";
                }
            }
            ?>
        </section>
    </main>

</body>

</html>