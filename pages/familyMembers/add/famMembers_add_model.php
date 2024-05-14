<?php
// fetch selected family
function get_family($pdo, $id)
{
    $query = "SELECT * FROM families WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
// fetch all memberships
function get_memberships($pdo)
{
    $query = "SELECT * FROM lidmaatschap;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// create new familymember
function set_familyMember($pdo, $familyId, $fName, $lName, $birthday, $membership)
{
    $query = "INSERT INTO familielid (familie_id, voornaam, achternaam, geboortedatum, lidmaatschap) 
    VALUES(:familie_id, :voornaam, :achternaam, :geboortedatum,:lidmaatschap)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":familie_id", $familyId);
    $stmt->bindParam(":voornaam", $fName);
    $stmt->bindParam(":achternaam", $lName);
    $stmt->bindParam(":geboortedatum", $birthday);
    $stmt->bindParam(":lidmaatschap", $membership);

    $stmt->execute();
}
