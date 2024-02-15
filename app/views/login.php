<!DOCTYPE html>
<html>
<head>
    <title>App de Login</title>
</head>
<body>
    <h2>Formulário de Login</h2>
    <?php if (isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="post" action="?route=authenticate">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Entrar</button>
        <button type="button" onclick="location.search = '?route=book'" >Sem login</button>
    </form>
</body>
</html>