<?php
require_once 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action == 'delete') {
        $id = $_POST['id'] ?? '';

        try {
            $stmt = $pdo->prepare('DELETE FROM categorys WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: /admin/conf_categorys.php?delete=1');
            exit();
        } catch (PDOException $e) {
            header('Location: /pages/register.php?error=1');
            exit();
        }
    }
}
header('Location: /');
exit();
?>