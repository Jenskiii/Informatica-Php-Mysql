<?php
// get clicked family
function get_family($pdo, $id)
{
    $query = "SELECT * FROM families WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// update family 
function set_family($pdo, $id, $surname, $residence, $address, $zipcode)
{
    $query = "UPDATE families SET achternaam = :achternaam , woonplaats =:woonplaats,
     adres = :adres, postcode = :postcode WHERE id= :id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":achternaam", $surname);
    $stmt->bindParam(":woonplaats", $residence);
    $stmt->bindParam(":adres", $address);
    $stmt->bindParam(":postcode", $zipcode);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}
// update familymember
function set_familyMember($pdo, $familyId, $surname)
{
    $query = "UPDATE familielid SET achternaam = :achternaam  WHERE familie_id = :familie_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":achternaam", $surname);
    $stmt->bindParam(":familie_id", $familyId);
    $stmt->execute();
}

// update booking with new family details
function set_updated_booking($pdo, $familyId, $surname)
{
    $query = "UPDATE contributie SET achternaam = :achternaam WHERE familie_id = :familie_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":achternaam", $surname);
    $stmt->bindParam(":familie_id", $familyId);
    $stmt->execute();
}

// get family address
function get_address($pdo, $id)
{
    $query = "SELECT adres FROM families WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}