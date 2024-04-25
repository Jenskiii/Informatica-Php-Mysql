<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $familyId = $_POST["family_id"];

    try {
        require_once '../../db/connection.php';
        require_once 'family_model.php';
        require_once 'family_functions.php';

        // fetch all family members
        $results = get_family_members($pdo, $familyId);
    
        $_SESSION["family_members"] =  $results;

        var_dump($_SESSION["family_members"]);
        // header("Location: family.php");
        // die();

    } catch (PDOException $e) {
        die("Query error" . $e->getMessage());
    }
} else {
    header("Location: ../home.php");
    die();
}