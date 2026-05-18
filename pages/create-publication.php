<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit;
}

$type = $_SESSION['type'];
?>

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
                    <li><a href="#">Publicações</a></li>
                </ul>
            </nav>

            <!--Icone de person-->
            <div class="person-icon"></div>
            <button class="btn-login" id="menu">
                <img src="/static/person-icon.png" alt="icon-login">
            </button>
        </div>
    </header>
