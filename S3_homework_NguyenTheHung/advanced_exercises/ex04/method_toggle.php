<?php
$methodUsed = $_SERVER["REQUEST_METHOD"];
$data = [];

if ($methodUsed === "POST") {
    $data = $_POST;
} elseif ($methodUsed === "GET") {
    $data = $_GET;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>GET vs POST</title>
    <script>
        function changeMethod(value) {
            document.getElementById("myForm").method = value;
        }
    </script>
</head>
<body>

<h2>GET vs POST Toggle</h2>

<form id="myForm" method="GET">
    <input type="radio" name="m" onclick="changeMethod('GET')" checked> Send via GET
    <input type="radio" name="m" onclick="changeMethod('POST')"> Send via POST
    <br><br>

    <input type="text" name="message" placeholder="Enter message">
    <br><br>

    <input type="submit" value="Send">
</form>

<hr>

<h3>Result</h3>

<p>Method Used: <?php echo $methodUsed; ?></p>

<pre>
<?php
print_r($data);
?>
</pre>

</body>
</html>