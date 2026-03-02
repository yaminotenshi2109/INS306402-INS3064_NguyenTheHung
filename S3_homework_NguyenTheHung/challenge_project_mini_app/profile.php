<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

$user = json_decode(file_get_contents("users.json"), true);
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!empty($_POST["bio"])) {
        $user["bio"] = htmlspecialchars($_POST["bio"]);
    }

    if (isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] === 0) {
        $type = $_FILES["avatar"]["type"];

        if ($type === "image/jpeg" || $type === "image/png") {
            $name = uniqid() . "_" . $_FILES["avatar"]["name"];
            move_uploaded_file($_FILES["avatar"]["tmp_name"], "uploads/" . $name);
            $user["avatar"] = $name;
        } else {
            $message = "Only JPG or PNG allowed";
        }
    }

    file_put_contents("users.json", json_encode($user));
    $message = "Profile updated";
}
?>

<h2>Profile</h2>

<p><?php echo $message; ?></p>

<?php if (!empty($user["avatar"])) { ?>
    <img src="uploads/<?php echo $user["avatar"]; ?>" width="100"><br>
<?php } ?>

<form method="post" enctype="multipart/form-data">
    Bio:<br>
    <textarea name="bio"><?php echo $user["bio"]; ?></textarea><br><br>

    Avatar:<br>
    <input type="file" name="avatar"><br><br>

    <input type="submit" value="Save">
</form>

<br>
<a href="logout.php">Logout</a>