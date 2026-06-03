<?php
session_start();
require_once 'config.php'; //pede ao config acessos

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //veio metodo POST de outro arquivo enviado para auth.php, se veio ele percorre o código 
    $action = $_POST['action'] ?? '';

    if ($action == 'login') { //se a ação for login
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';



        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?'); //prepare o banco de dados
        $stmt->execute([$email]); //envia o valor da variavel/percorre o banco
        $user = $stmt->fetch(); //pega o valor (pedro, joao)


        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            header('Location: /pages/profile.php?logado'); //se os dados tiverem corretos manda para a location
            exit();
        } else {
            header('Location: /pages/login.php?error=1'); //dads incorretos, permanecem no login e na url retorna erro
            exit();
        }
    } 

    if ($action == 'register') { //Ação para registro de usuario 
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $hashPassword = password_hash($password, PASSWORD_DEFAULT); //criptografa a senha do usuario

        try {
            $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
            $stmt->execute([$name, $email, $hashPassword]);
            header('Location: /pages/login.php?registered=1');
            exit();
        } catch (PDOException $e) {
            header('Location: /pages/register.php?error=1');
            exit();
        }
    }

    if ($action == 'delete') { //Ação para registro de usuario 
        $id = $_POST['id'] ?? '';

        try {
            $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
            $stmt->execute([$id]);
            header('Location: /administration/conf_users.php?delete=1');
            exit();
        } catch (PDOException $e) {
            header('Location: /administration/conf_users.php?error=1');
            exit();
        }
    }

    

}
header('Location: /pages/login.php');
exit();
?>