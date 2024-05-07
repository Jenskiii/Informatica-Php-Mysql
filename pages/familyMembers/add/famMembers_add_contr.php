<?php
if (
    $_SERVER["REQUEST_METHOD"] === "POST"
) {
    $familyId = $_POST["famMembers_add_familyId"];
    try {
        require_once '../../../db/connection.php';
        require_once 'famMembers_add_model.php';
        require_once 'famMembers_add_functions.php';

        $results = get_family($pdo, $familyId);
        $memberships = get_memberships($pdo);

        // activate session
        require_once ("../../../includes/session.php");
        $_SESSION["famMembers_add_famData"] = $results;
        $_SESSION["famMembers_add_memberships"] = $memberships;

        // return to home
        header("Location: famMembers_add.php?familyId=$familyId");
        // reset pdo
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query error" . $e->getMessage());
    }
} else {
    header("Location: famMembers.php");
    die();
}