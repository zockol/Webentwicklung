<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] === true) {
    header("Location: index.php");
    exit;
}

// Handle the login form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['user'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate credentials (replace with your actual user verification logic)
    if ($username === "bob" && $password === "geheim") {
        $_SESSION["isLoggedIn"] = true;
        $_SESSION["user"] = $username;

        // Redirect to the index page after successful login
        header("Location: index.php");
        exit;
    } else {
        $error = "Ungültige Anmeldedaten. Bitte versuchen Sie es erneut.";
    }
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>Login page</header>
    <main class="container-fluid">
        <h1 class="display-4">Anmelden</h1>
        <!-- Display error message if login fails -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="user">Benutzername</label>
                <input type="text" class="form-control" id="user" name="user" required>
            </div>
            <div class="form-group">
                <label for="password">Passwort</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Anmelden">
        </form>
    </main>
    <footer>Footer</footer>
</body>

</html>
