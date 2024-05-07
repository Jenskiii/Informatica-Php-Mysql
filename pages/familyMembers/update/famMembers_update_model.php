<?php

// get clicked familymember
function get_familyMember($pdo, $id)
{
    $query = "SELECT * FROM familielid WHERE id = :id;";
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

// update familymember
function set_familyMember($pdo, $id, $fName, $birthday, $membership)
{
    $query = "UPDATE familielid SET voornaam = :voornaam , geboortedatum = :geboortedatum,
     lidmaatschap = :lidmaatschap WHERE id= :id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":voornaam", $fName);
    $stmt->bindParam(":geboortedatum", $birthday);
    $stmt->bindParam(":lidmaatschap", $membership);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

