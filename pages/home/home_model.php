<?php 

function get_families($pdo){
    $query = "SELECT * FROM familie";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}