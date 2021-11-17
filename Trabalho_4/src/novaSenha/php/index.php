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
    <link rel="stylesheet" href="../../utils//global_css/buttons.css">
    <link rel="stylesheet" href="../../utils//global_css//links.css">
    <link rel="stylesheet" href="../css//novaSenha.css">

    <title>Programação Web - PUC-Pr</title>
</head>

<body>
    <header class="display_flex_col">
        <div class="display_flex_row bem_vindo">
            <h1>Nova Senha</h1>
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
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/listaProdutos/php/">Lista de Produtos</a></li>
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/minhaLista/php/">Minha Lista</a></li>
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/meusDados/php/">Meus Dados</a></li>
                    <form action="../../utils//logout.php" method="get">
                        <button type="submit" class="logout_btn">Sair</button>
                    </form>
                    ';
                } else if ($_SESSION['isAdm'] == 1) {
                    echo '                    
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/listaProdutos/php/">Lista de Produtos</a></li>
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/minhaLista/php/">Minha Lista</a></li>
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/srccadastroDeProdutos/php/">Cadastro de Produtos</a></li>
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/srccadastroUsuario/php/">Cadastro de Usuários</a></li>
                    <li><a href="http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/meusDados/php/">Meus Dados</a></li>
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
                <form action="#" method="post" class="form">
                    <div class="display_flex_col container_pass">
                        <div class="display_flex_row">
                            <label for="pass">Nova senha: </label>
                            <input type="password" name="pass" id="pass" minlength="6" maxlength="9" title="Senha com no minimo 4 caracteres e máximo de 9 caracteres" required><span> *</span>
                        </div>

                        <div class="display_flex_row">
                            <label for="confirmed-pass">Confirme a senha:</label>
                            <input type="password" name="confirmed-pass" id="confirmed-pass" minlength="4" maxlength="9" title="Repita a senha" required><span> *</span>
                        </div>
                    </div>

                    <button type="submit" class="atualizar_senha_btn">Atualizar Senha</button>
                </form>
                <?php
                require('./validationPass.php');
                $novaSenha = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                if ($novaSenha !== null) {
                    $senhaOk = validationPass($novaSenha);

                    if ($senhaOk['0'] == true) {
                        echo $senhaOk['1'];
                        header("location: ../../meusDados/php/");
                        die();
                    } else {
                        echo $senhaOk['1'];
                    }
                }
                ?>
            </article>

        </section>
    </main>

</body>

</html>