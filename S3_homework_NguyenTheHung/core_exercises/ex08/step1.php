<?php
$user = "";
$pass = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["username"])) {
        $user = trim($_POST["username"]);
    }
    if (isset($_POST["password"])) {
        $pass = trim($_POST["password"]);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Step 1</title>
</head>
<body>

<h2>Step 1: Account Info</h2>

<form method="post" action="step2.php">

    <label>Username:</label><br>
    <input type="text" name="username"
            value="<?php echo htmlspecialchars($user); ?>"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>

    <input type="submit" value="Next">

</form>

</body>
</html>