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
    <link rel="stylesheet" href="../css/cadastroDeProdutos.css">
    <title>Programação Web - PUC-Pr</title>
</head>

<body>
    <header>
        <div class="title_welcome">
            <h1>Cadastro de Produtos</h1>
            <?php
            echo "<p>Administrador(a) " . $_SESSION['userName'] . " </p> ";
            ?>
        </div>
        <nav>
            <ul>
                <li><a href="../../minhaLista/php">Minha Lista</a></li>
                <li><a href="../../listaProdutos/php/">Lista de Produtos</a></li>
                <li><a href="../../cadastroUsuario/php/">Cadastro de Usuários</a></li>
                <li><a href="../../meusDados/php/">Configuração do Usuário</a></li>
                <li><a href="../../listaDeUsuarios/php/">Lista de Usuários</a></li>
            </ul>
        </nav>
        <form action="../../utils//logout.php" method="get">
            <button type="submit" class="logout_btn">Sair</button>
        </form>
    </header>
    <main class="display_flex_col">
        <section class="display_flex_col">
            <article class="display_flex_col">


                <form action="#" method="post" class="form">
                    <label for="nome_produto">Nome do Produto: <span> *</span></label>
                    <input type="text" name="nome_produto" required>

                    <div class="confirmed">
                        <a href="../../listaProdutos//php/" class="links">Cancelar</a>
                        <button type="submit" name="produtosBtn" class="atualizar_btn">Cadastrar</button>
                    </div>
                    <span>* Campo Obrigatório</span>
                </form>

                <div>
                    <?php
                    require_once('doProductsRegister.php');
                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                    if (!is_null($dados['nome_produto'])) {
                        doProductsRegister($dados['nome_produto']);
                    }
                    ?>
                </div>
            </article>
        </section>
    </main>
</body>

</html>