<?php
require_once '../config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Publi - Hosthome</title>
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
                    <li><a href="/pages/publications.php">Publicações</a></li>
                    <li><a href="#">Tags</a></li>
                </ul>
            </nav>

            <!--Icone de person-->
            <div class="person-icon"></div>
            <button class="btn-login" id="menu">
                <a href="/pages/user_profile.php">
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
        <form action="../auth.php" method="POST">
            <input type="hidden" name="action" value="update">
            <div class="insert-publication">
                <label for="name">Name</label>
                <input type="text" name="name" required="required">

                <label for="gmail">Email</label>
                <input type="email" name="email" required="required">

                <label for="age">Idade</label>
                <input type="number" min="0" max="110" name="age" required="required">

                <label for="sex">Sexo</label>
                <select value="" name="sex" required="required">
                    <option value=""></option>
                    <?php
                        echo "<option value=''>" . htmlspecialchars('Masculino')  . "</option>";
                        echo "<option value=''>" . htmlspecialchars('Feminino')  . "</option>";
                    ?>
                </select>

                <label for="phone">Telefone</label>
                <input type="number" maxlength="11" name="phone"  required="required">

            </div>
            <button class="btn" type="submit">Atualizar</button>
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