<?php
function get_family_members($pdo, $familyId){
    $query = "SELECT * FROM familielid WHERE familie_id = :familie_id ORDER BY geboortedatum;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":familie_id", $familyId);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

function get_booking($pdo, $familyMemberId){
    $currentDate = date("Y");

    $query = "SELECT * FROM contributie WHERE familielid_id = :familielid_id AND boekjaar = :boekjaar;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":familielid_id", $familyMemberId);
    $stmt->bindParam(":boekjaar", $currentDate);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results;
}