<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
if ((!isset($_SESSION['userName']) == true) and (!isset($_SESSION['isAdm']) == true)) {
    unset($_SESSION['userName']);
    unset($_SESSION['isAdm']);
    header('Location: ../../home/php');
} else {
    if ($_SESSION['isAdm'] == 0) {
        header('Location: ../../listaProdutos/php');
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../utils//global_css//globalCss.css">
    <link rel="stylesheet" href="../../utils//global_css//links.css">
    <link rel="stylesheet" href="../../utils//global_css//buttons.css">
    <link rel="stylesheet" href="../css//deletarProduto.css">
    <title>Programação Web - PUC-Pr</title>
</head>

<body>
    <header>
        <div class="title_welcome">
            <div>
                <h1 class="title">Excluir Produto</h1>
            </div>
            <div class="bem_vindo">
                <?php
                echo "<p>Administrador(a) " . $_SESSION['userName'] . " </p> ";
                ?>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="../../minhaLista/php/">Minha Lista</a></li>
                <li><a href="../../cadastroDeProdutos/php/">Cadastro de Produtos</a> </li>
                <li><a href="../../cadastroUsuario/php/">Cadastro de Usuários</a></li>
                <li><a href="../../meusDados/php/">Meus Dados</a></li>
                <li><a href="../../listaDeUsuarios/php/">Lista de Usuários</a></li>
            </ul>
        </nav>
        <form action="../../utils//logout.php" method="get">
            <button type="submit" class="logout_btn">Sair</button>
        </form>
    </header>
    <main class="display_flex_col">
        <section class="display_flex_col">
            <article class="display_flex_col container_product_info">
                <div class=" text">
                    <?php
                    echo "<p>Confirmar exclusão do item <strong>" . $_GET['nome_produto'] . "</strong>?</p>";
                    ?>
                </div>
                <div class="confirmed">
                    <a href="../../listaProdutos/php/" class="links">Cancelar</a>
                    <form action="#" method="post">
                        <?php
                        $idProduct = $_GET['id_product'];
                        echo "
                            <input type='hidden' value='$idProduct' name='idProduct'>
                            ";
                        ?>
                        <button type="submit" class="atualizar_btn">Excluir</button>
                    </form>
                </div>
                <?php
                require('./deletarProduto.php');
                $product = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                if ($product != null) {
                    $wasDeleted = deletarProduto($product['idProduct']);

                    if ($wasDeleted) {
                        header('location: http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/listaProdutos/php/');
                    } else {
                        echo "<p class='alert'>Erro: contate o desenvolvedor</p>";
                    }
                }
                ?>
            </article>
        </section>
    </main>

</body>

</html>