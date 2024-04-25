<?php
// check db if username excists
function get_username($pdo, $username)
{
    $query = "SELECT gebruikersnaam FROM gebruikers WHERE gebruikersnaam = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


// check db if email excists
function get_email($pdo, $email)
{
    $query = "SELECT gebruikersnaam FROM gebruikers WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}



function set_user($pdo, $username, $email, $pwd)
{
    $query = "INSERT gebruikers (gebruikersnaam, email, wachtwoord) 
    VALUES(:gebruikersnaam, :email, :wachtwoord)";

    // hash password
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":gebruikersnaam", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":wachtwoord", $hashedPwd);
    $stmt->execute();
}

