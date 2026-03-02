<?php
$name = "";
$email = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["name"])) {
        $name = trim($_POST["name"]);
    }

    if (isset($_POST["email"])) {
        $email = trim($_POST["email"]);
    }

    if (isset($_POST["password"])) {
        $password = trim($_POST["password"]);
    } else {
        $password = "";
    }

    if ($password === "" || strlen($password) < 6) {
        $error = "Password too short";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sticky Form</title>
</head>
<body>

<h2>Registration Form</h2>

<?php
if ($error !== "") {
    echo "<p>" . $error . "</p>";
}
?>

<form method="post" action="">

    <label>Name:</label><br>
    <input type="text" name="name"
        value="<?php echo htmlspecialchars($name); ?>"><br><br>

    <label>Email:</label><br>
    <input type="text" name="email"
        value="<?php echo htmlspecialchars($email); ?>"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>

    <input type="submit" value="Register">

</form>

</body>
</html>