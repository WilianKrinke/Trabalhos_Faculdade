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
    <link rel="stylesheet" href="../../utils//global_css//globalCss.css">
    <link rel="stylesheet" href="../../utils//global_css//buttons.css">
    <link rel="stylesheet" href="../../utils//global_css//links.css">
    <link rel="stylesheet" href="../css//cadastroUsuario.css">
    <title>Programação Web - PUC - Pr</title>
</head>

<body>
    <header>
        <div class="title_welcome">
            <div>
                <h1 class="title">Cadastro de Usuário</h1>
            </div>
            <div>
                <?php
                if (isset($_SESSION['isAdm'])) {
                    if ($_SESSION['isAdm'] == 1) {
                        echo "<p>Administrador(a) " . $_SESSION['userName'] . " </p> ";
                    } else {
                        echo "<p>Bem-vindo(a) " . $_SESSION['userName'] . " </p> ";
                    }
                }
                ?>
            </div>
        </div>
        <?php
        if (isset($_SESSION['isAdm'])) {
            if ($_SESSION['isAdm'] == 1) {
                echo '
                    <nav>
                        <ul>
                            <li><a href="../../minhaLista/php">Minha Lista</a></li>
                            <li><a href="../../listaProdutos/php/">Lista de Produtos</a></li>
                            <li><a href="../..//cadastroDeProdutos/php/">Cadastro de Produtos</a></li>
                            <li><a href="../../meusDados/php">Meus Dados</a></li>
                            <li><a href="../../listaDeUsuarios/php/">Lista de Usuários</a></li>
                            </ul>                    
                    </nav>
                    <form action="../../utils//logout.php" method="get">
                        <button type="submit" class="logout_btn">Sair</button>
                    </form>
                    ';
            }
        }
        ?>
    </header>
    <main class="display_flex_col main">
        <section class="display_flex_col">
            <article>

                <form action="#" method="post" class="form" autocomplete="on">
                    <div class="div_form">
                        <label for="name">Nome de Usuário:</label>
                        <input type="text" name="name" id="name" title="Digite seu primeiro nome" required autofocus><span> *</span>
                    </div>

                    <div class="div_form_birth">
                        <label for="birthday">Data de Nascimento:</label>
                        <input type="date" name="birthday" id="birthday" min="1940-01-01" title="Escolha sua data de nascimento" required pattern="/(\d{4})[-.\/](\d{2})[-.\/](\d{2})/"><span> *</span>
                    </div>

                    <div class="div_form">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="last-name" title="Digite seu e-mail" required><span> *</span>
                    </div>

                    <?php
                    if (!isset($_SESSION['isAdm'])) {
                        echo ' <input type="radio" name="typeuser" id="commonuser" value="0" hidden checked>';
                    } else {
                        if ($_SESSION['isAdm'] == 1) {
                            echo '
                            <div class="display_flex_col container_radios">
                                <label for="typeuser">Type of user: <span> *</span></label>
                            <div>
                                <input type="radio" name="typeuser" id="commonuser" value="0" checked>
                                <label for="commonuser">Common User</label>
                            </div>
                                <div>
                                    <input type="radio" name="typeuser" id="adm" value="1">
                                    <label for="adm">Administrator</label>
                                </div>
                            </div>
                        ';
                        }
                    }
                    ?>

                    <div class="display_flex_col container_pass">
                        <div class="display_flex_row first_pass">
                            <label for="pass">Senha do usuário:</label>
                            <input type="password" name="pass" id="pass" minlength="6" maxlength="9" title="Senha com no minimo 4 caracteres e máximo de 9 caracteres" required><span> *</span>
                        </div>

                        <div class="display_flex_row repeat_pass">
                            <label for="confirmed-pass">Confirme a senha:</label>
                            <input type="password" name="confirmed-pass" id="confirmed-pass" minlength="4" maxlength="9" title="Repita a senha" required><span> *</span>
                        </div>
                    </div>

                    <div class="confirmed">
                        <?php
                        if (!(isset($_SESSION['userName']) == true) and !(isset($_SESSION['isAdm']) == true)) {
                            echo "<a href='http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/home/php/' class='cadastrar'>Página Inicial</a>";
                        }
                        ?>
                        <button type="submit" class="atualizar_btn">Cadastrar</button>
                    </div>
                    <span> * Campos obrigatórios</span>
                </form>
                <?php
                require_once('dataValidator.php');
                require_once('doRegister.php');

                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                if ($dados !== null) {
                    $isValid = dataValidator($dados);

                    if ($isValid[0] === true) {
                        $isRegistered = doRegister($dados);

                        if ($isRegistered[0] === true) {

                            if ((isset($_SESSION['userName']) == true) and (isset($_SESSION['isAdm']) == true)) {
                                echo $isRegistered[1];
                            } else {
                                echo $isRegistered[1];
                            }
                        } else {
                            echo $isRegistered[1];
                        }
                    } else {
                        echo $isValid[1];
                    }
                }
                ?>
            </article>
        </section>
    </main>
</body>

</html>