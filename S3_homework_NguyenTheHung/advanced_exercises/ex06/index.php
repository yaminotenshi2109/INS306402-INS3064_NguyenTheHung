<?php
$page = "home";

if (isset($_GET["page"])) {
    $page = $_GET["page"];
}

$file = "pages/" . $page . ".php";

if (file_exists($file)) {
    include $file;
} else {
    echo "<h2>404 - Page Not Found</h2>";
}