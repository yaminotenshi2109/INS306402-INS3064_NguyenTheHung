<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
        $errors[] = "Username must be alphanumeric only";
    }

    if (!preg_match("/[A-Z]/", $password)) {
        $errors[] = "Password missing uppercase letter";
    }

    if (!preg_match("/[a-z]/", $password)) {
        $errors[] = "Password missing lowercase letter";
    }

    if (!preg_match("/[0-9]/", $password)) {
        $errors[] = "Password missing number";
    }

    if (!preg_match("/[^a-zA-Z0-9]/", $password)) {
        $errors[] = "Password missing symbol";
    }

    if (strlen($password) < 8) {
        $errors[] = "Password too short";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Regex Validation</title>
</head>
<body>

<h2>Register</h2>

<form method="post">
    <label>Username:</label><br>
    <input type="text" name="username"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>

    <input type="submit" value="Register">
</form>

<?php
if (!empty($errors)) {
    echo "<ul>";
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul>";
}
?>

</body>
</html>