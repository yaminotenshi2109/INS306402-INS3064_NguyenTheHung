<?php
$username = "";
$password = "";
$bio = "";
$location = "";

if (isset($_POST["username"])) {
    $username = trim($_POST["username"]);
}

if (isset($_POST["password"])) {
    $password = trim($_POST["password"]);
}

if (isset($_POST["bio"])) {
    $bio = trim($_POST["bio"]);
}

if (isset($_POST["location"])) {
    $location = trim($_POST["location"]);
}

$finalSubmit = isset($_POST["final"]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Step 2</title>
</head>
<body>

<?php if (!$finalSubmit) { ?>

<h2>Step 2: Profile Info</h2>

<form method="post" action="">

    <input type="hidden" name="username"
            value="<?php echo htmlspecialchars($username); ?>">

    <input type="hidden" name="password"
            value="<?php echo htmlspecialchars($password); ?>">

    <label>Bio:</label><br>
    <textarea name="bio"></textarea><br><br>

    <label>Location:</label><br>
    <input type="text" name="location"><br><br>

    <input type="submit" name="final" value="Finish">

</form>

<?php } else { ?>

<h2>Registration Complete</h2>

<ul>
    <li><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></li>
    <li><strong>Password:</strong> <?php echo htmlspecialchars($password); ?></li>
    <li><strong>Bio:</strong> <?php echo htmlspecialchars($bio); ?></li>
    <li><strong>Location:</strong> <?php echo htmlspecialchars($location); ?></li>
</ul>

<?php } ?>

</body>
</html>