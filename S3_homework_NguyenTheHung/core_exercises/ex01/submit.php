<!DOCTYPE html>
<html>
<head>
    <title>Form Result</title>
</head>
<body>

<h2>Submitted Information</h2>

<?php

if (
    !isset($_POST["fullname"]) ||
    !isset($_POST["email"]) ||
    !isset($_POST["phone"]) ||
    !isset($_POST["message"])
) {
    echo "<p>Missing Data</p>";
} else {

    $fullname = trim($_POST["fullname"]);
    $email    = trim($_POST["email"]);
    $phone    = trim($_POST["phone"]);
    $message  = trim($_POST["message"]);

    if (
        $fullname === "" ||
        $email === "" ||
        $phone === "" ||
        $message === ""
    ) {
        echo "<p>Missing Data</p>";
    } else {

        echo "<ul>";
        echo "<li><strong>Full Name:</strong> " . $fullname . "</li>";
        echo "<li><strong>Email:</strong> " . $email . "</li>";
        echo "<li><strong>Phone:</strong> " . $phone . "</li>";
        echo "<li><strong>Message:</strong> " . $message . "</li>";
        echo "</ul>";
    }
}
?>

</body>
</html>
