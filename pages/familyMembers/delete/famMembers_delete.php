<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $familyMemberId = $_POST["delete_familyMember_id"];
    $familyId = $_POST["delete_family_id"];

    try {
        require_once '../../../db/connection.php';

        $query = "DELETE FROM familielid WHERE id = :id;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id", $familyMemberId);
        $stmt->execute();

        header("Location:../famMembers.php?familyId=$familyId&memberDeleted=success");
        // reset pdo
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query error" . $e->getMessage());
    }

} else {
    header("Location: ../famMembers.php");
    die();
}