<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fName = strtolower($_POST["famMembers_update_fName"]);
    $birthday = $_POST["famMembers_update_birthday"];
    $membership = $_POST["famMembers_update_membership"];
    $familyId = $_POST["famMembers_update_familyId"];
    $id = $_POST["famMembers_update_memberId"];

    try {
        require_once '../../../db/connection.php';
        require_once 'famMembers_update_model.php';
        require_once 'famMembers_update_functions.php';

        // FORM VALIDATION
        $errors = [];



        // bind error to session + return to signup page
        require_once ("../../../includes/session.php");
        if ($errors) {
            $_SESSION["errors_famMembers_update"] = $errors;

            header("Location: ./famMembers_update.php");
            // reset pdo
            $pdo = null;
            $stmt = null;
            die();
        }

        // signup user + return to login
        update_familyMember($pdo, $id, $fName, $birthday, $membership);
        header("Location: ../famMembers.php?familyId=$familyId&memberUpdated=success");

        // reset pdo
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query error" . $e->getMessage());
    }

} else {
    header("Location: f_update.php");
    die();
}