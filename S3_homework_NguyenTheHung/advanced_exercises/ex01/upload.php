<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_FILES["avatar"])) {
        $message = "No file selected";
    } else {

        $file = $_FILES["avatar"];

        if ($file["error"] !== 0) {
            $message = "Upload error";
        } else {

            $allowedTypes = ["image/jpeg", "image/png"];

            if (!in_array($file["type"], $allowedTypes)) {
                $message = "Only JPG and PNG allowed";
            } elseif ($file["size"] > 2 * 1024 * 1024) {
                $message = "File too large (max 2MB)";
            } else {

                $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
                $newName = uniqid() . "." . $ext;

                if (move_uploaded_file($file["tmp_name"], "uploads/" . $newName)) {
                    $message = "Upload successful";
                } else {
                    $message = "Failed to move file";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Avatar Upload</title>
</head>
<body>

<h2>Upload Avatar</h2>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="avatar">
    <br><br>
    <input type="submit" value="Upload">
</form>

<p><?php echo $message; ?></p>

</body>
</html>