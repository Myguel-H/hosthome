<?php
require_once 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';


    if ($action == 'create') {
        $name = $_POST['name_category'] ?? '';
        $description = $_POST['description'] ?? '';

        try {
            $stmt = $pdo->prepare('INSERT INTO categorys (name, description) VALUES (?, ?)');
            $stmt->execute([$name, $description]);
            header('Location: /admin/addcategorys.php?registered=1');
            exit();
        } catch (PDOException $e) {
            header('Location: /admin/addcategorys.php?error=1') . $e->getMessage();
            exit();
        }
    }
}
header('Location: /');
exit();
?>