<?php
session_start();

if (!isset($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_POST["csrf_token"])) {
        http_response_code(403);
        die("403 Forbidden");
    }

    if ($_POST["csrf_token"] !== $_SESSION["csrf_token"]) {
        http_response_code(403);
        die("403 Forbidden");
    }

    $message = "Form submitted successfully";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSRF Protected Form</title>
</head>
<body>

<h2>CSRF Demo</h2>

<form method="post">
    <input type="hidden" name="csrf_token"
            value="<?php echo $_SESSION["csrf_token"]; ?>">

    <label>Name:</label><br>
    <input type="text" name="name"><br><br>

    <input type="submit" value="Submit">
</form>

<p><?php echo $message; ?></p>

</body>
</html>