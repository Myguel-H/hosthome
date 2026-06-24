<?php
require_once '../config.php';
session_start();
if (empty($_SESSION['admin'])) {
    return header('location: ../otario.php');
}

if ($user_id > 0) {
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Categoria - Hosthome</title>
        <link class="logo-title" rel="icon" href="../static/logohosthome.webp" type="img-icon">
        <link rel="stylesheet" href="../style.css">
    </head>

    <body>

        <!--------------------------- H    E    A    D    E    R --------------------------->
    <!--Logo e Nome-->
        <header>
            <div class="logo-name">
                <img class="logo-icon" src="/static/logohosthome.webp" alt="Logo">
                <a href="/">
                    <h2>HostHome</h2>
                </a>
            </div>

            <div class="header-actions">
                <!---Menu header-->
                <nav>
                    <ul class="menu">
                        <li><a href="/">Início</a></li>
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
        <form action="../create_category.php" method="POST">
            <input type="hidden" name="action" value="create">
            <div class="insert-publication">
                <label for="name_category">Categoria</label>
                <input type="text" name="name_category" required="required" placeholder="Digite uma categoria">

                <label for="description">Descrição</label>
                <textarea name="description" required="required" maxlength="250"
                    placeholder="Digite uma breve descrição da categoria... Limitado a 250 caracteres"></textarea>
                </select>

            </div>
            <button class="btn" type="submit">Criar</button>
        </form>

        <div class="tables">
            <!--Tabela categorias-->
            <div class="user-list">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $pdo->query("SELECT id, name, description FROM categorys");
                        $category = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($category as $row):
                            ?>
                            <tr>
                                <td>
                                    <?= $row['id'] ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($row['name']) ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($row['description']) ?>
                                </td>
                                <td>
                                    <form action="../delete_category.php" method="POST">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button type="submit">Deletar</button>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
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
