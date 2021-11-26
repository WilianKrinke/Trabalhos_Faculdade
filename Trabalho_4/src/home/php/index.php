<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../../utils//global_css//globalCss.css">
    <link rel="stylesheet" href="../../utils//global_css//buttons.css">
    <link rel="stylesheet" href="../../utils//global_css//links.css">
    <title>Programação Web - PUC-Pr</title>
</head>

<body>
    <header>
        <h1>Atp Fundamentos de Programação Web</h1>
    </header>
    <main class="display_flex_col">
        <section class="display_flex_col">
            <article class="display_flex_col">

                <form action="#" method="post" class="form">
                    <div class="container_input">
                        <label for="userName" title="UserName" class="label">Usuário:</label>
                        <input type="text" name="userName" id="userName">
                    </div>

                    <div class="container_input">
                        <label for="pass" title="Digite sua Senha" class="label">Senha:</label>
                        <input type="password" name="pass" id="pass">
                    </div>

                    <div class="container_btn">
                        <button type="submit" class="entrar">Entrar</button>
                        <a href="../../cadastroUsuario/php/index.php" class="cadastrar">Cadastre-se</a>
                    </div>
                </form>

                <?php
                require_once('login.php');
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                if (!is_null($dados)) {
                    $userName = $dados['userName'];
                    $senha = $dados['pass'];

                    $isFindUsers = login($userName, $senha);

                    if ($isFindUsers[0] === true) {
                        session_start();
                        $_SESSION['userId'] = $isFindUsers[1];
                        $_SESSION['userName'] = $isFindUsers[2];
                        $_SESSION['isAdm'] = $isFindUsers[3];
                        header("Location: ../../listaProdutos/php");
                    } else {
                        echo '<p>Usuario ou senha incorretos</p>';
                    }
                }
                ?>
            </article>
        </section>
    </main>
</body>

</html>