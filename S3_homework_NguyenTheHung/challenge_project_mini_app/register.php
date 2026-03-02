<?php
$errors = [];
$username = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["username"])) {
        $errors[] = "Username is required";
    } else {
        $username = $_POST["username"];
    }

    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"]) || empty($_POST["confirm"])) {
        $errors[] = "Password fields are required";
    } elseif ($_POST["password"] !== $_POST["confirm"]) {
        $errors[] = "Passwords do not match";
    }

    if (empty($errors)) {
        $data = [
            "username" => $username,
            "email" => $email,
            "password" => $_POST["password"],
            "bio" => "",
            "avatar" => ""
        ];

        file_put_contents("users.json", json_encode($data));
        echo "<p>Registration successful. <a href='login.php'>Login</a></p>";
        exit;
    }
}
?>

<h2>Register</h2>

<?php
foreach ($errors as $e) {
    echo "<p style='color:red'>$e</p>";
}
?>

<form method="post">
    Username:<br>
    <input type="text" name="username" value="<?php echo $username; ?>"><br><br>

    Email:<br>
    <input type="text" name="email" value="<?php echo $email; ?>"><br><br>

    Password:<br>
    <input type="password" name="password"><br><br>

    Confirm Password:<br>
    <input type="password" name="confirm"><br><br>

    <input type="submit" value="Register">
</form>