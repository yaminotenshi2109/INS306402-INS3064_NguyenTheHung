<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!file_exists("users.json")) {
        $error = "No user registered";
    } else {
        $user = json_decode(file_get_contents("users.json"), true);

        if ($_POST["username"] === $user["username"]
            && $_POST["password"] === $user["password"]) {

            $_SESSION["user"] = $user["username"];
            header("Location: profile.php");
            exit;
        } else {
            $error = "Invalid credentials";
        }
    }
}
?>

<h2>Login</h2>

<p style="color:red"><?php echo $error; ?></p>

<form method="post">
    Username:<br>
    <input type="text" name="username"><br><br>

    Password:<br>
    <input type="password" name="password"><br><br>

    <input type="submit" value="Login">
</form>