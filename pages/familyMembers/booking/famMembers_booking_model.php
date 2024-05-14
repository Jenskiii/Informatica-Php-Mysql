<?php
// get member
function get_familyMember($pdo, $id)
{
    $query = "SELECT * FROM familielid WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
// fetch memberships
function get_membership_discount($pdo, $membership)
{
    $query = "SELECT korting FROM lidmaatschap WHERE omschrijving = :omschrijving;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":omschrijving", $membership);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// create contribution
function set_contribution($pdo, $memberId, $familyId, $fullName, $age, $membership, $price, $bookyear)
{
    $query = "INSERT INTO contributie (familielid_id, familie_id, naam, leeftijd, lidmaatschap, bedrag, boekjaar) 
    VALUES(:familielid_id, :familie_id, :naam, :leeftijd,:lidmaatschap,:bedrag,:boekjaar)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":familielid_id", $memberId);
    $stmt->bindParam(":familie_id", $familyId);
    $stmt->bindParam(":naam", $fullName);
    $stmt->bindParam(":leeftijd", $age);
    $stmt->bindParam(":lidmaatschap", $membership);
    $stmt->bindParam(":bedrag", $price);
    $stmt->bindParam(":boekjaar", $bookyear);

    $stmt->execute();
}

function get_current_bookyears($pdo){
    $query = "SELECT jaar FROM boekjaar";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function create_bookyear($pdo,$bookyear){
    $query = "INSERT INTO boekjaar (jaar) 
    VALUES(:jaar)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":jaar", $bookyear);

    $stmt->execute();
}