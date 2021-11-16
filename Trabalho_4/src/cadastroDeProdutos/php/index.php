<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
if ((isset($_SESSION['userName']) == true) and (isset($_SESSION['isAdm']) == true)) {
    if ($_SESSION['isAdm'] == 0) {
        header('Location: ../../listaProdutos/php');
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../utils/globalCss.css">
    <link rel="stylesheet" href="../../utils//global_css//links.css">
    <link rel="stylesheet" href="../../utils//global_css//buttons.css">
    <link rel="stylesheet" href="../css//cadastroDeProdutos.css">
    <title>Programação Web - PUC-Pr</title>
</head>

<body>
    <header class="display_flex">
        <div class="display_flex_row container_list bem_vindo">
            <h1>Cadastro de Produtos</h1>
            <?php
            if ((isset($_SESSION['userName']) == true) and (isset($_SESSION['isAdm']) == true)) {
                if ($_SESSION['isAdm'] == 1) {
                    echo "<p>Bem-vindo(a) administrador(a) " . $_SESSION['userName'] . " </p> ";
                }
            }
            ?>
        </div>

        <?php
        if (isset($_SESSION['isAdm'])) {
            if ($_SESSION['isAdm'] == 1) {
                echo '
                    <nav class="container_list">
                        <ul class="box_list">
                            <li><a href="../../minhaLista/php">Minha Lista</a></li>
                            <li><a href="../../listaProdutos/php/">Lista de Produtos</a></li>
                            <li><a href="../../cadastroUsuario/php/">Cadastro de Usuários</a></li>
                            <li><a href="../../meusDados/php/">Configuração do Usuário</a></li>
                            <li><a href="../../listaDeUsuarios/php/">Lista de usuários</a></li>
                            <form action="../../utils//logout.php" method="get">
                                <button type="submit" class="logout_btn">Sair</button>
                            </form>
                        </ul>                    
                    </nav>
                    ';
            }
        }
        ?>
    </header>
    <main class="display_flex_col">
        <section class="display_flex_col">
            <article class="display_flex_col">
                <form action="#" method="post" class="form">
                    <label for="nome_produto">Nome do Produto: <span> *</span></label>
                    <input type="text" name="nome_produto" required>
                    <button type="submit" name="produtosBtn" class="atualizar_btn">Cadastrar</button>
                    <span>* Campo Obrigatório</span>
                </form>

                <?php
                require_once('doProductsRegister.php');
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                if (!is_null($dados['nome_produto'])) {
                    echo doProductsRegister($dados['nome_produto']);
                }
                ?>
            </article>
        </section>
    </main>
</body>

</html>