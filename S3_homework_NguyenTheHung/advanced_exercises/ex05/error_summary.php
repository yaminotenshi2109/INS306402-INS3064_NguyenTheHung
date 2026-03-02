<?php
$errors = [];
$name = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["name"])) {
        $errors["name"] = "Name is required";
    } else {
        $name = $_POST["name"];
    }

    if (empty($_POST["email"])) {
        $errors["email"] = "Email is required";
    } else {
        $email = $_POST["email"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Error Summary</title>
    <style>
        .error-box {
            color: red;
            border: 1px solid red;
            padding: 10px;
        }
        .error {
            border: 1px solid red;
        }
    </style>
</head>
<body>

<h2>Form with Error Summary</h2>

<?php if (!empty($errors)) { ?>
    <div class="error-box">
        <ul>
            <?php
            foreach ($errors as $e) {
                echo "<li>$e</li>";
            }
            ?>
        </ul>
    </div>
<?php } ?>

<form method="post">
    <label>Name:</label><br>
    <input type="text" name="name"
            value="<?php echo $name; ?>"
            class="<?php echo isset($errors['name']) ? 'error' : ''; ?>">
    <br><br>

    <label>Email:</label><br>
    <input type="text" name="email"
            value="<?php echo $email; ?>"
            class="<?php echo isset($errors['email']) ? 'error' : ''; ?>">
    <br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>