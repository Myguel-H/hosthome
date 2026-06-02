<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Hosthome</title>
    <link class="logo-title" rel="icon" href="../static/logohosthome.webp" type="img-icon">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <!--------------------------- H    E    A    D    E    R --------------------------->
    <!--Logo e Nome-->
    <header>
        <div class="logo-name">
            <img class="logo-icon" src="/static/logohosthome.webp" alt="Logo">
            <a href="../index.php">
                <h2>HostHome</h2>
            </a>
        </div>

        <div class="header-actions">
            <!---Menu header-->
            <nav>
                <ul class="menu">
                    <li><a href="/index.php">Início</a></li>
                    <li><a href="/pages/publications.php">Publicações</a></li>
                    <li><a href="/pages/addpubli.php">Publicar</a></li>
                </ul>
            </nav>

            <!--Icone de person-->
            <div class="person-icon"></div>
            <button class="btn-login" id="menu">
                <a href="/pages/profile.php">
                    <img src="/static/person-icon.png" alt="icon-login">
                </a>
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
                <li><a href="../logout.php">Sair</a></li>
            </ul>
        </nav>
    </div>

    <div class="profile-user">
        <div class="data-user">
            <?php
            require_once '../config.php';
            $user_id = $_SESSION['user_id'] ?? 0;

            if ($user_id > 0) {

                $stmt = $pdo->prepare("SELECT name, email, age, sex, phone, avatar, data_cadastro, type FROM users WHERE id = ?");
                $stmt->execute([$user_id]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    ?>

            <img class="img-user" src="../static/img_person/admin.jpeg" alt="avatar">


            <p><strong>Nome:</strong>
                <?= htmlspecialchars($user['name']) ?><button><img src="../static/botão-editar" alt="Editar"></button>
            </p>
            <p><strong>Email:</strong>
                <?= htmlspecialchars($user['email']) ?><button><img src="../static/botão-editar" alt="Editar"></button>
            </p>
            <p><strong>Idade:</strong>
                <?= htmlspecialchars($user['age'] ?? 'dado não encontrado') ?><button><img src="../static/botão-editar"
                        alt="Editar"></button>
            </p>
            <p><strong>Sexo:</strong>
                <?= htmlspecialchars($user['sex'] ?? 'dado não encontrado') ?><button><img src="../static/botão-editar"
                        alt="Editar"></button>
            </p>
            <p><strong>Telefone:</strong>
                <?= htmlspecialchars($user['phone'] ?? 'dado não encontrado') ?><button><img
                        src="../static/botão-editar" alt="Editar"></button>
            </p>
            <p><strong>Cadastro:</strong>
                <?= date('d/m/Y', strtotime($user['data_cadastro'])) ?><button><img src="../static/botão-editar"
                        alt="Editar"></button>
            </p>
            <p><strong>Tipo:</strong>
                <?= htmlspecialchars($user['type']) ?><button><img src="../static/botão-editar" alt="Editar"></button>
            </p>

            <?php } else {
                    echo "<p>USUARIO NAO ECONTRADO</p>";
                }
            } else {
                echo"<p>Você não está logado, faça login para poder visualizar! </p>"; 
            } ?> 
        </div>
        
    </div>

    <!------------------------- F    O    O    T    E    R --------------------------->

    <div class="footer-container">
        <p>
            <img src="/static/copyleft-icon.png" alt="icon-copyleft"> Myguel Henryque Dachery do Prado | HTML5/CSS3
        </p>
    </div>
    </div>

</body>