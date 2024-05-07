<?php
// add family 
function set_family($pdo, $surname, $residence, $address, $zipcode)
{
    $query = "INSERT families (achternaam, woonplaats, adres, postcode) 
    VALUES(:achternaam, :woonplaats, :adres, :postcode)";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":achternaam", $surname);
    $stmt->bindParam(":woonplaats", $residence);
    $stmt->bindParam(":adres", $address);
    $stmt->bindParam(":postcode", $zipcode);
    $stmt->execute();
}

// get family address
function get_address($pdo, $address)
{
    $query = "SELECT adres FROM families WHERE adres = :adres;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":adres", $address);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}