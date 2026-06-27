<?php
session_start();
require_once 'config.php'; //pede ao config acessos

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //veio metodo POST de outro arquivo enviado para auth.php, se veio ele percorre o código 
    $action = $_POST['action'] ?? '';

    if ($action == 'delete') { //Ação para deletar usuario 
        $id = $_POST['id'] ?? '';

        try {
            $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: /admin/conf_users.php?delete=1');
            exit();
        } catch (PDOException $e) {
            header('Location: /admin/conf_users.php?error=1');
            exit();
        }
    }

    

}
header('Location: /pages/login.php');
exit();
?>