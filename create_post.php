<?php
require_once 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';


    if ($action == 'publish') {
        $title = $_POST['title'] ?? '';
        $resume = $_POST['resume'] ?? '';
        $about = $_POST['about'] ?? '';
        $creator_id = $_POST['creator_id'] ?? '';
        $category_id = $_POST['category_id'] ?? '';
        $content = $_POST['content'] ?? '';

        try {
            $stmt = $pdo->prepare('INSERT INTO publications (title, resume, about, creator_id, category_id, content) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([$title, $resume, $about, $creator_id, $category_id, $content]);
            header('Location: /pages/publications.php?registered=1');
            exit();
        } catch (PDOException $e) {
            header('Location: /pages/addpubli.php?error=1') . $e->getMessage();
            exit();
        }
    }
}
header('Location: /');
exit();
?>