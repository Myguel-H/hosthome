<?php
require_once '../config.php';
session_start();
?>

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
                    <li><a href="../index.php">Início</a></li>
                    <li><a href="/pages/publications.php">Publicações</a></li>
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
                <li><a href="../logout.php">Sair</a></li>
            </ul>
        </nav>
    </div>

    <div class="add-publication">

        <?php
        require_once '../config.php';

        $user_id = $_SESSION['user_id'] ?? 0;

        if ($user_id > 0) {
            ?>
        <form action="../create_post.php" method="POST">
            <input type="hidden" name="action" value="publish">
            <div class="insert-publication">
                <label for="title">Titulo</label>
                <input type="text" name="title" required="required" placeholder="Digite um título">

                <label for="resume">Resumo</label>
                <textarea name="resume" required="required" maxlength="250"
                    placeholder="Digite um breve resumo da publicação... Limitado a 250 caracteres"></textarea>

                <label for="about">Sobre</label>
                <textarea name="about" rows="3" required="required" maxlength="250"
                    placeholder="Informações adicionais sobre o tema... Limitado a 250 caracteres"></textarea>

                <label for="creator_id">Criador</label>
                <select name="creator_id" required="required">
                    <option value="">Escolha um(a) criador(a)</option>
                    <?php
                    $creators = $pdo->query("SELECT id, user_creator FROM creators ORDER BY user_creator")->fetchAll();
                    foreach ($creators as $creator) {
                        echo "<option value='{$creator['id']}'>" . htmlspecialchars($creator['user_creator']) . "</option>";
                    }
                    ?>
                </select>

                <label for="category_id">Categorias</label>
                <select name="category_id" required="required">
                    <option value="">Escolha uma categoria</option>
                    <?php
                    $categorys = $pdo->query("SELECT id, name FROM categorys ORDER BY name")->fetchAll();
                    foreach ($categorys as $category) {
                        echo "<option value='{$category['id']}'>" . htmlspecialchars($category['name']) . "</option>";
                    }
                    ?>
                </select>

                <label for="content">Conteúdo</label>
                <textarea name="content" rows="6" required="required"
                    placeholder="Digite o conteúdo completo do artigo..."></textarea>
            </div>
            <button class="btn" type="submit">Publicar</button>
        </form>
        <?php
        } else {
            echo "<p>Você não está logado</p>";
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