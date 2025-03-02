<!-- anmeldeformular.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="post">
        <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($redirect); ?>">
        <label for="username">Benutzername:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Passwort:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Einloggen">
    </form>
</body>
</html>
