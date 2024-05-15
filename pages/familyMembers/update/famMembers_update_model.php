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

// get discount from membership
function get_membership_discount($pdo, $membership)
{
    $query = "SELECT korting FROM lidmaatschap WHERE omschrijving = :omschrijving;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":omschrijving", $membership);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

//  update booking
function set_updated_booking($pdo, $id, $fName, $age , $membership, $price){
    $query = "UPDATE contributie SET voornaam = :voornaam,  leeftijd = :leeftijd,
    lidmaatschap = :lidmaatschap, bedrag = :bedrag WHERE familielid_id= :familielid_id;";

   $stmt = $pdo->prepare($query);
  
   $stmt->bindParam(":voornaam", $fName);
   $stmt->bindParam(":leeftijd", $age);
   $stmt->bindParam(":lidmaatschap", $membership);
   $stmt->bindParam(":bedrag", $price);
   $stmt->bindParam(":familielid_id", $id);
   $stmt->execute();
}