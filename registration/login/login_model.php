<?php

// fetch user data
function get_user($pdo, $username){
    $query = "SELECT * FROM gebruikers WHERE gebruikersnaam = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

