<?php 

function get_families($pdo){
    $query = "SELECT * FROM families ORDER BY achternaam";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}