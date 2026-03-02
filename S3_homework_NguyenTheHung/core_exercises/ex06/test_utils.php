<?php
require "utils.php";

echo "<h2>Validation Test Results</h2>";

/* sanitize test */
$raw = "  <b>Hello</b>  ";
$clean = sanitize($raw);

if ($clean !== "") {
    echo "<p>sanitize(): Pass</p>";
} else {
    echo "<p>sanitize(): Fail</p>";
}

/* email tests */
if (validateEmail("test@example.com")) {
    echo "<p>validateEmail(): Pass</p>";
} else {
    echo "<p>validateEmail(): Fail</p>";
}

if (!validateEmail("testexample")) {
    echo "<p>validateEmail (invalid): Pass</p>";
} else {
    echo "<p>validateEmail (invalid): Fail</p>";
}

/* length tests */
if (validateLength("Hello", 3, 10)) {
    echo "<p>validateLength(): Pass</p>";
} else {
    echo "<p>validateLength(): Fail</p>";
}

if (!validateLength("Hi", 3, 10)) {
    echo "<p>validateLength (too short): Pass</p>";
} else {
    echo "<p>validateLength (too short): Fail</p>";
}

/* password tests */
if (validatePassword("abc!123")) {
    echo "<p>validatePassword(): Pass</p>";
} else {
    echo "<p>validatePassword(): Fail</p>";
}

if (!validatePassword("abc123")) {
    echo "<p>validatePassword (no special char): Pass</p>";
} else {
    echo "<p>validatePassword (no special char): Fail</p>";
}