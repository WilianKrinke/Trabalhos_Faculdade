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
    <link rel="stylesheet" href="../css/deletarUsuario.css">
    <title>Programação Web - PUC-Pr</title>
</head>

<body>
    <header>
        <div class="title_welcome">
            <div>
                <h1 class="title">Excluir Produto</h1>
            </div>
            <div>
                <?php
                echo "<p class='welcome'>Administrador(a) " . $_SESSION['userName'] . " </p> ";
                ?>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="../../minhaLista/php/">Minha Lista</a></li>
                <li><a href="../../cadastroDeProdutos/php/">Cadastro de Produtos</a> </li>
                <li><a href="../../cadastroUsuario/php/">Cadastro de Usuários</a></li>
                <li><a href="../../meusDados/php/">Meus Dados</a></li>
                <li><a href="../../listaProdutos/php">Lista de produtos</a></li>
            </ul>
        </nav>
        <form action="../../utils//logout.php" method="get">
            <button type="submit" class="logout_btn">Sair</button>
        </form>
    </header>
    <main>
        <section class="display_flex_col">
            <article class="display_flex_col container_info">
                <div>
                    <?php
                    echo "<p>Confirma a exclusão do usuário <strong>&quot" . $_GET['user_name'] . "&quot</strong>?</p>"
                    ?>
                </div>
                <div class="display_flex_row container_confirmation">
                    <a href="../../listaDeUsuarios/php/" class="links">Cancelar</a>
                    <form action="#" method="post">
                        <?php
                        $idUser = $_GET['id_user'];
                        $userName = $_GET['user_name'];
                        echo "
                        <input type='hidden' value='$idUser' name='idUser'>                        
                        "
                        ?>
                        <button type="submit" class="atualizar_btn">Excluir</button>
                    </form>
                </div>
                <?php
                require('./excluirUsuario.php');
                $userArr = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                if ($userArr != null) {
                    $wasDeleted = excluirUsuario($userArr['idUser']);

                    if ($wasDeleted) {
                        echo "<p class='done'>Usuario Excluido</p>";
                        header("location: ../../listaDeUsuarios/php/");
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