<?php
// check if input is empty
function is_input_empty($username, $pwd, $email, $pwdConfirm)
{
    if (empty($username) || empty($pwd) || empty($email) || empty($pwdConfirm)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_password_invalid($pwd)
{
    $uppercase = preg_match('@[A-Z]@', $pwd);
    $lowercase = preg_match('@[a-z]@', $pwd);
    $number = preg_match('@[0-9]@', $pwd);

    if (!$uppercase || !$lowercase || !$number || strlen($pwd) < 8) {
        return true;
    }else{
        return false;
    }
}

function do_passwords_match($pwd, $pwdConfirm){
    if($pwd !== $pwdConfirm){
        return true;
    }else{
        return false;
    }
}

function is_username_taken($pdo, $username)
{
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_taken($pdo, $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user($pdo, $username, $email, $pwd)
{
    set_user($pdo, $username, $email, $pwd);
}

