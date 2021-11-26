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
    <link rel="stylesheet" href="../css/meuDados.css">
    <title>Programação Web - PUC-Pr</title>
</head>

<body>
    <header>
        <div class="title_welcome">
            <div>
                <h1 class="title">Meus Dados</h1>
            </div>
        </div>
        <div>
            <?php
            if ($_SESSION['isAdm'] == 1) {
                echo "<p class='welcome'>Administrador(a) " . $_SESSION['userName'] . " </p> ";
            } else {
                echo "<p class='welcome'>Bem-vindo(a) " . $_SESSION['userName'] . " </p> ";
            }
            ?>
        </div>

        <nav>
            <ul>
                <?php
                if ($_SESSION['isAdm'] == 0) {
                    echo '
                    <li><a href="../../listaProdutos/php">Lista de Produtos</a></li>
                    <li><a href="../../minhaLista/php/">Minha Lista</a></li>
                    ';
                } else if ($_SESSION['isAdm'] == 1) {
                    echo '                    
                    <li><a href="../../minhaLista/php/">Minha Lista</a></li>
                    <li><a href="../../listaProdutos/php">Lista de Produtos</a></li>
                    <li><a href="../../cadastroDeProdutos/php/">Cadastro de Produtos</a> </li>
                    <li><a href="../../cadastroUsuario/php/">Cadastro de Usuários</a></li>
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
        <section>
            <article>
                <div class="dados_atuais">
                    <div class="data_box">
                        <?php
                        require('./getDatas.php');
                        $idUser = $_SESSION['userId'];
                        getDatas($idUser);
                        ?>
                    </div>
                </div>

                <div class="edicao_dados display_flex_col">
                    <div class="box_update">
                        <form class="form" action="./upDateName.php" method="post" autocomplete="on" name="userName">
                            <label for="name">Nome de Usuário:</label>
                            <input type="text" name="name" id="name" title="Digite seu primeiro nome" required autofocus><span> *</span>
                            <?php
                            $idUser = $_SESSION['userId'];
                            echo "<input type='hidden' name='id' value='$idUser'>";
                            ?>
                            <button type="submit" class="atualizar_btn">Atualizar</button>
                        </form>
                    </div>

                    <div class="box_update">
                        <form class="form" action="./upDateBirthday.php" method="post" autocomplete="on" name="birthday">
                            <label for="birthday">Data de Nascimento:</label>
                            <input type="date" name="birthday" id="birthday" min="1940-01-01" title="Escolha sua data de nascimento" required pattern="/(\d{4})[-.\/](\d{2})[-.\/](\d{2})/"><span> *</span>
                            <?php
                            $idUser = $_SESSION['userId'];
                            echo "<input type='hidden' name='id' value='$idUser'>";
                            ?>
                            <button type="submit" class="atualizar_btn">Atualizar</button>
                        </form>
                    </div>

                    <div class="box_update">
                        <form class="form" action="./upDateEmail.php" method="post" autocomplete="on" name="email">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" id="last-name" title="Digite seu e-mail" required><span> *</span>
                            <?php
                            $idUser = $_SESSION['userId'];
                            echo "<input type='hidden' name='id' value='$idUser'>";
                            ?>
                            <button type="submit" class="atualizar_btn">Atualizar</button>
                        </form>
                    </div>
                    <span> * Campos obrigatórios</span>

                    <a href="../../novaSenha/php/">Atualizar Senha</a>
                </div>
            </article>
        </section>
    </main>
</body>

</html>