<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: comum.php");
} elseif (isset($_SESSION['admin_id'])) {
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../style.css">

</head>

<body>

    <div class="container-account">
        <div class="account-box">
            <h2>Register</h2>
            <?php if (isset($GET['error'])): ?>
                <div class="error">Email ou senha invalida !</div>
            <?php endif; ?>
            <?php if (isset($GET['registered'])): ?>
                <div class="error">Registrado com sucesso !</div>
            <?php endif; ?>
            <form action="auth.php" class="form-box" method="POST">
                <input type="hidden" name="action" value="login">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">password</label>
                    <input type="password" name="password" required>
                </div>
                <button class="btn" type="submit">Registrar-se</button>
            </form>
        </div>
        <p class="link-account">Ja possui conta ? <a href="#">Logue-se aqui</a></p>
    </div>
</body>

</html>