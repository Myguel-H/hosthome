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
                    <li><a href="#">Início</a></li>
                    <li><a href="#">Publicações</a></li>
                    <li><a href="#">Usuários</a></li>
                    <li><a href="/pages/profile.php">Perfil</a></li>
                    <li><a href="../index.php">Sair</a></li>
                </ul>
            </nav>

            <!--Icone de person-->
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
                <li><a href="#">Ajuda</a></li>
            </ul>
        </nav>
    </div>

    <div class="tables">
        <!--Tabela usuarios-->
        <div class="user-list">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../config.php'; //faz uma requisição no config.php
                    
                    $stmt = $pdo->query("SELECT id, name, email, type FROM users");
                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($users as $row):
                        ?>
                        <tr>
                            <td>
                                <?= $row['id'] ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['name']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['email']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['type']) ?>
                            </td>
                            <td>ações</td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


        <!--Tabela publicações-->
        <div class="publication-list">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Sobre</th>
                        <th>Criador</th>
                        <th>Categoria</th>
                        <th>Conteúdo</th>
                        <th>Data da criação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../config.php';

                    $stmt = $pdo->query("
    SELECT 
        p.id, 
        p.title, 
        p.about, 
        u.name as create, 
        c.name as category, 
        p.content, 
        p.creation_date
    FROM publication p 
    JOIN users u ON p.user_id = u.id 
    JOIN category c ON p.category_id = c.id
");
                    $publication = $stmt->fetchAll(PDO::FETCH_ASSOC);


                    foreach ($publication as $row):
                        ?>
                        <tr>
                            <td>
                                <?= $row['id'] ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['title']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['about']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['create']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['category']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['content']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['creation_date']) ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>



    <div class="btn-publi">
        <a href="#">Criar Publicação</a>
    </div>


    <!------------------------- F    O    O    T    E    R --------------------------->

    <div class="footer-container">
        <p>
            <img src="/static/copyleft-icon.png" alt="icon-copyleft"> Myguel Henryque Dachery do Prado | HTML5/CSS3
        </p>
    </div>
    </div>

</body>