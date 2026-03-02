<?php
session_start();

/* initialize attempt counter */
if (!isset($_SESSION["fails"])) {
    $_SESSION["fails"] = 0;
}

/* hardcoded credentials */
$correctUser = "admin";
$correctPass = "123456";

$message = "";
$showAttempts = false;

if (isset($_POST["username"]) && isset($_POST["password"])) {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username === "" || $password === "") {
        $message = "Invalid Credentials";
        $_SESSION["fails"]++;
        $showAttempts = true;
    } else {

        if ($username === $correctUser && $password === $correctPass) {
            $message = "Login Successful";
            $_SESSION["fails"] = 0;
        } else {
            $message = "Invalid Credentials";
            $_SESSION["fails"]++;
            $showAttempts = true;
        }

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Login</title>
</head>
<body>

<h2>Login</h2>

<form method="post" action="">
    <label>Username:</label><br>
    <input type="text" name="username"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>

    <input type="submit" value="Login">
</form>

<?php
if ($message !== "") {
    echo "<p>" . $message . "</p>";
}

if ($showAttempts) {
    echo "<p>Failed Attempts: " . $_SESSION["fails"] . "</p>";
}
?>

</body>
</html>
