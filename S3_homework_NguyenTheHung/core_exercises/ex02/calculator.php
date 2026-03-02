<?php
$result = "";
$error = "";
$equation = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (
        isset($_POST["num1"]) &&
        isset($_POST["num2"]) &&
        isset($_POST["op"])
    ) {

        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $op   = $_POST["op"];

        if (is_numeric($num1) && is_numeric($num2)) {

            if ($op === "/" && $num2 == 0) {
                $error = "Cannot divide by zero";
            } else {

                if ($op === "+") {
                    $result = $num1 + $num2;
                }

                if ($op === "-") {
                    $result = $num1 - $num2;
                }

                if ($op === "*") {
                    $result = $num1 * $num2;
                }

                if ($op === "/") {
                    $result = $num1 / $num2;
                }

                $equation = $num1 . " " . $op . " " . $num2 . " = " . $result;
            }

        } else {
            $error = "Inputs must be numeric";
        }

    } else {
        $error = "Missing Data";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Arithmetic Calculator</title>
</head>
<body>

<h2>Arithmetic Calculator</h2>

<form method="post" action="">

    <label>First Number:</label><br>
    <input type="text" name="num1"><br><br>

    <label>Second Number:</label><br>
    <input type="text" name="num2"><br><br>

    <label>Operation:</label><br>
    <select name="op">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br><br>

    <input type="submit" value="Calculate">

</form>

<?php
if ($error !== "") {
    echo "<p>" . $error . "</p>";
}

if ($equation !== "") {
    echo "<p>" . $equation . "</p>";
}
?>

</body>
</html>