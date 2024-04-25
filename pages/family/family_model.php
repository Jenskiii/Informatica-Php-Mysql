<?php
function get_family_members($pdo, $familyId){
    $query = "SELECT * FROM familielid WHERE familie_id = :familie_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":familie_id", $familyId);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}