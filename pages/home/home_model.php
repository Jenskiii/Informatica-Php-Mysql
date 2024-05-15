<?php 
// get all families
function get_families($pdo){
    $query = "SELECT * FROM families ORDER BY achternaam";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

// get all contributions from selected family
function get_contribution($pdo, $familyId){
    $query = "SELECT bedrag FROM contributie WHERE familie_id = :familie_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":familie_id", $familyId);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}