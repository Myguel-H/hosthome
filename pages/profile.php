<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homehost - Myguel</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <!--------------------------- H    E    A    D    E    R --------------------------->
    <!--Logo e Nome-->
    <header>
        <div class="logo-name">
            <img class="logo-icon" src="/static/logohosthome.webp" alt="Logo">
            <a href="../index.php">
                <h2>HomeHost</h2>
            </a>
        </div>

        <div class="header-actions">
            <!---Menu header-->
            <nav>
                <ul class="menu">
                    <li><a href="/teste.html">Início</a></li>
                    <li><a href="/pages/publication.php">Publicações</a></li>
                    <li><a href="#">Tags</a></li>
                </ul>
            </nav>

            <!--Icone de person-->
            <div class="person-icon"></div>
            <button class="btn-login" id="menu">
                <img src="/static/person-icon.png" alt="icon-login">
            </button>
        </div>
    </header>

    <!------------------------- B    O    D    Y --------------------------->

    <div class="sidebar-lateral">
        <nav>
            <ul class="sidebar-actions">
                <h3>Sobre as publicações</h3>
                <li><a href="#">Recentes</a></li>
                <li><a href="#">Apagadas</a></li>
                <li><a href="#">Favoritas</a></li>
                <h3>Sobre</h3>
                <li><a href="#">Configurações</a></li>
                <li><a href="#">Sobre</a></li>
            </ul>
        </nav>
    </div>

    <div class="profile-user">
        <div class="data-user">
            <?php
            require_once '../config.php';
            session_start();

            $user_id = $_SESSION['user_id'] ?? 0;

            if ($user_id > 0) {

                $stmt = $pdo->prepare("SELECT name, email, age, sex, phone, avatar, data_cadastro, type FROM users WHERE id = ?");
                $stmt->execute([$user_id]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    ?>

                    <img class="img-user" src="../static/user.png" alt="avatar">


                    <p><strong>Nome:</strong> <?= htmlspecialchars($user['name']) ?><button><img src="../static/botão-editar" alt="Editar"></button></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?><button><img src="../static/botão-editar" alt="Editar"></button></p>
                    <p><strong>Idade:</strong> <?= htmlspecialchars($user['age']) ?><button><img src="../static/botão-editar" alt="Editar"></button></p>
                    <p><strong>Sexo:</strong> <?= htmlspecialchars($user['sex']) ?><button><img src="../static/botão-editar" alt="Editar"></button></p>
                    <p><strong>Telefone:</strong> <?= htmlspecialchars('(dd) dddd-dddd', $user['phone']) ?><button><img src="../static/botão-editar" alt="Editar"></button></p>
                    <p><strong>Cadastro:</strong> <?= date('d/m/Y', strtotime($user['data_cadastro'])) ?><button><img src="../static/botão-editar" alt="Editar"></button></p>
                    <p><strong>Tipo:</strong> <?= htmlspecialchars($user['type']) ?><button><img src="../static/botão-editar" alt="Editar"></button></p>

            <?php } else {
                    echo "<p>USUARIO NAO ECONTRADO</p>";
                }
            } else {
                echo "<p>VOCA NAO TA LOGADO</p>";
            } ?>
        </div>
    </div>

    <div class="btn-publi">
        <a href="/pages/addpubli.php">Criar Publicação</a>
    </div>


    <!------------------------- F    O    O    T    E    R --------------------------->

    <div class="footer-container">
        <p>
            <img src="/static/copyleft-icon.png" alt="icon-copyleft"> Myguel Henryque Dachery do Prado | HTML5/CSS3
        </p>
    </div>
    </div>

</body>