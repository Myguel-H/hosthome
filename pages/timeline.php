<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline - Hosthome</title>
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
                    <li><a href="../index.php">Início</a></li>
                    <li><a href="/pages/addpubli.php">Publicar</a></li>                    
                    <li><a href="#">Tags</a></li>
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
                <li><a href="../index.php">Sair</a></li>
            </ul>
        </nav>
    </div>

    <div class="add-publication timeline-page">
        <?php
        require_once '../config.php';

            $stmt = $pdo->prepare("SELECT p.title, p.resume, p.about, u.user_creator as criador, c.name as categoria, p.content, p.creation_date FROM publications p JOIN creators u ON p.creator_id = u.id JOIN categorys c ON p.category_id = c.id");
            $stmt->execute();
            $publications = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($publications) > 0) {
                ?>
        <div class="pub-container">
            <?php
            foreach ($publications as $pub) {
                ?>
            <div class="pub-itens">
                <p><strong>Titulo</strong>
                    <?= htmlspecialchars($pub['title']) ?>
                </p>

                <p><strong>Resumo</strong>
                    <?= htmlspecialchars($pub['resume']) ?>
                </p>

                <p><strong>Sobre</strong>
                    <?= htmlspecialchars($pub['about']) ?>
                </p>

                <p><strong>Criador</strong>
                    <?= htmlspecialchars($pub['criador']) ?>
                </p>

                <p><strong>Categoria</strong>
                    <?= htmlspecialchars($pub['categoria']) ?>
                </p>

                <p><strong>Conteudo</strong>
                    <?= htmlspecialchars($pub['content']) ?>
                </p>

                <p><strong>Cadastro:</strong>
                    <?= date('d/m/Y', strtotime($pub['creation_date'])) ?>
                </p>

            </div>
            <?php
            }
            ?>
        </div>
        <?php
            } else {
                echo "<p>Nenhuma publicação encontrada</p></div>";
            }
            ?>

    </div>

    <!------------------------- F    O    O    T    E    R --------------------------->

    <div class="footer-container">
        <p>
            <img src="/static/copyleft-icon.png" alt="icon-copyleft"> Myguel Henryque Dachery do Prado | HTML5/CSS3
        </p>
    </div>
    </div>

</body>