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
    <link rel="stylesheet" href="../../utils//global_css/links.css">
    <link rel="stylesheet" href="../../utils//global_css//buttons.css">
    <link rel="stylesheet" href="../css/listaDeUsuarios.css">
    <title>Programação Web - PUC-Pr</title>
</head>

<body>
    <header>
        <div class="title_welcome">
            <div>
                <h1 class="title">Lista de Usuários</h1>
            </div>
            <div>
                <?php
                echo "<p class='welcome'>Administrador(a) " . $_SESSION['userName'] . " </p> ";
                ?>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="../../listaProdutos/php/">Lista de Produtos</a></li>
                <li><a href="../../minhaLista/php/">Minha Lista</a></li>
                <li><a href="../../cadastroDeProdutos/php/">Cadastro de Produtos</a> </li>
                <li><a href="../../cadastroUsuario/php/">Cadastro de Usuários</a></li>
                <li><a href="../../meusDados/php/">Meus Dados</a></li>
            </ul>
        </nav>
        <form action="../../utils//logout.php" method="get">
            <button type="submit" class="logout_btn">Sair</button>
        </form>
    </header>
    <main class="display_flex_col">
        <section class="display_flex_col">
            <article class="display_flex_col container_list_products">
                <table>
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Administrador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('./getUsers.php');
                        getUsers();
                        ?>
                    </tbody>
                </table>
            </article>
        </section>
    </main>
</body>

</html>