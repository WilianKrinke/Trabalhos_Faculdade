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
    <link rel="stylesheet" href="../../utils//globalCss.css">
    <link rel="stylesheet" href="../../utils//global_css//links.css">
    <link rel="stylesheet" href="../../utils//global_css//buttons.css">
    <link rel="stylesheet" href="../css//minhaLista.css">
    <title>Programação Web - PUC-Pr</title>
</head>

<body>
    <header class="display_flex_col">
        <div class="display_flex_row container_list bem_vindo">
            <h1>Minha Lista</h1>
            <?php
            if ($_SESSION['isAdm'] == 1) {
                echo "<p>Bem-vindo(a) administrador(a) " . $_SESSION['userName'] . " </p> ";
            } else {
                echo "<p>Bem-vindo(a) " . $_SESSION['userName'] . " </p> ";
            }
            ?>
        </div>
        <nav class="container_list">
            <ul class="box_list">
                <?php
                if ($_SESSION['isAdm'] == 0) {
                    echo '
                    <li><a href="../../listaProdutos/php/">Lista de Produtos</a></li>
                    <li><a href="../../meusDados/php/">Meus Dados</a></li>
                    <form action="../../utils//logout.php" method="get">
                        <button type="submit" class="logout_btn">Sair</button>
                    </form>
                    ';
                } else if ($_SESSION['isAdm'] == 1) {
                    echo '                    
                    <li><a href="../../listaProdutos/php/">Lista de Produtos</a></li>
                    <li><a href="../../cadastroDeProdutos/php/">Cadastro de Produtos</a></li>
                    <li><a href="../../cadastroUsuario/php/">Cadastro de Usuários</a></li>
                    <li><a href="../../meusDados/php/">Meus Dados</a></li>
                    <li><a href="../../listaDeUsuarios/php/">Lista de usuários</a></li>
                    <form action="../../utils//logout.php" method="get">
                        <button type="submit" class="logout_btn">Sair</button>
                    </form>
                    ';
                }
                ?>
            </ul>
        </nav>
    </header>
    <main class="display_flex_col">
        <section class="display_flex_col">
            <article class="display_flex_col">
                <?php
                require_once('./getMyProducts.php');
                getMyProducts($_SESSION['userId']);
                ?>

            </article>
        </section>
    </main>
</body>

</html>