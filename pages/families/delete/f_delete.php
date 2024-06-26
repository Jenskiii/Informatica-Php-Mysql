<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $familyId = $_POST["delete_family_id"];

    try {
        require_once '../../../db/connection.php';

        // delete selected family
        $query = "DELETE FROM families WHERE id = :id;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id", $familyId);
        $stmt->execute();
        
        // return to home
        header("Location: ../../../index.php?delete=success");

        // reset pdo
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        if ($e->errorInfo[1] === 1451) {

            // if family holds members show error that it can't be deleted
            header("Location: ../../../index.php?familyDeleteError=fail");
            // reset pdo
            $pdo = null;
            $stmt = null;
            die();
        } else {
            die("Query error" . $e->getMessage());
        }

    }

} else {
    header("Location: ../../../index.php");
    die();
}