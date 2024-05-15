<?php
// get all years
function get_years($pdo)
{
    $query = "SELECT jaar FROM boekjaar;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// fetch all contributions
function get_contributions($pdo){
    $query = "SELECT * FROM contributie ORDER BY boekjaar";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// fetch all filtered contributions
function get_filtered_contributions($pdo, $bookyear){
    $query = "SELECT * FROM contributie WHERE boekjaar = :boekjaar ORDER BY familie_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":boekjaar", $bookyear);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}