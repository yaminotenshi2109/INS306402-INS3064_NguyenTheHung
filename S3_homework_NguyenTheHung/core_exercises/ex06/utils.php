<?php

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validateEmail($email)
{
    if ($email === "") {
        return false;
    }

    if (strpos($email, "@") === false) {
        return false;
    }

    if (strpos($email, ".") === false) {
        return false;
    }

    return true;
}

function validateLength($str, $min, $max)
{
    $length = strlen($str);

    if ($length < $min) {
        return false;
    }

    if ($length > $max) {
        return false;
    }

    return true;
}

function validatePassword($pass)
{
    if (strlen($pass) < 6) {
        return false;
    }

    if (
        strpos($pass, "!") === false &&
        strpos($pass, "@") === false &&
        strpos($pass, "#") === false
    ) {
        return false;
    }

    return true;
}