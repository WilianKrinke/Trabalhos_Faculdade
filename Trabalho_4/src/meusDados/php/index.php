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
    <link rel="stylesheet" href="../css/meuDados.css">
    <link rel="stylesheet" href="../../utils//global_css//buttons.css">
    <title>Programação Web - PUC-Pr</title>
</head>

<body>
    <header class="display_flex_col">
        <div class="display_flex_row container_list bem_vindo">
            <h1>Meus Dados</h1>
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
                    <li><a href="../../listaProdutos/php">Lista de Produtos</a></li>
                    <li><a href="../../minhaLista/php/">Minha Lista</a></li>
                    <form action="../../utils//logout.php" method="get">
                        <button type="submit" class="logout_btn">Sair</button>
                    </form>
                    ';
                } else if ($_SESSION['isAdm'] == 1) {
                    echo '                    
                    <li><a href="../../minhaLista/php/">Minha Lista</a></li>
                    <li><a href="../../listaProdutos/php">Lista de Produtos</a></li>
                    <li><a href="../../cadastroDeProdutos/php/">Cadastro de Produtos</a> </li>
                    <li><a href="../../cadastroUsuario/php/">Cadastro de Usuários</a></li>
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
            <article class="display_flex_row">

                <div class="dados_atuais">
                    <div class="data_box">
                        <?php
                        require('./getDatas.php');
                        $idProducts = $_SESSION['userId'];
                        getDatas($idProducts);
                        ?>
                    </div>
                </div>

                <div class="edicao_dados">
                    <form action="#" method="post" class="form" autocomplete="on" class="display_flex_col">
                        <div>
                            <label for="name">Nome de Usuário:</label>
                            <input type="text" name="name" id="name" title="Digite seu primeiro nome" required autofocus><span> *</span>
                        </div>

                        <div>
                            <label for="birthday">Data de Nascimento:</label>
                            <input type="date" name="birthday" id="birthday" min="1940-01-01" title="Escolha sua data de nascimento" required pattern="/(\d{4})[-.\/](\d{2})[-.\/](\d{2})/"><span> *</span>
                        </div>

                        <div>
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" id="last-name" title="Digite seu e-mail" required><span> *</span>
                        </div>

                        <div class="display_flex_col">
                            <button type="submit" class="atualizar_btn">Atualizar</button>
                            <span> * Campos obrigatórios</span>
                        </div>
                    </form>

                    <?php
                    require_once('./upDateValidator.php');
                    require_once('./doUpdate.php');

                    $newUserDatas = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    if ($newUserDatas !== null) {
                        $isValid = upDateValidator($newUserDatas);

                        if ($isValid[0] === true) {
                            $isRegistered = upDateUserData($newUserDatas);

                            if ($isRegistered[0] === true) {
                                echo $isRegistered[1];
                            } else {
                                echo $isRegistered[1];
                            }
                        } else {
                            echo $isValid[1];
                        }
                    }
                    ?>
                    <a href="../../novaSenha/php/">Atualizar Senha</a>
                </div>

            </article>
        </section>
    </main>
</body>

</html>