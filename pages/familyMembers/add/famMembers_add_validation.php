<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // input values
    $fName = strtolower($_POST["famMember_add_fName"]);
    $membership = $_POST["famMember_add_membership"];
    $birthday = $_POST["famMember_add_birthday"];
    $lName = strtolower($_POST["famMember_add_lName"]);
    $familyId = $_POST["famMember_add_familyId"];

    try {
        require_once '../../../db/connection.php';
        require_once 'famMembers_add_model.php';
        require_once 'famMembers_add_functions.php';

        // FORM VALIDATION
        $errors = [];

        if (is_input_empty($fName, $birthday, $membership)) {
            $errors["empty_input"] = "Alle velden verplicht!";
        }

        if (is_firstname_invalid($fName)) {
            $errors["invalid_firstname"] = "Voornaam kan geen nummers bevatten!";
        }

        // bind error to session + return to signup page
        require_once ("../../../includes/session.php");
        if ($errors) {
            $_SESSION["famMembers_add_errors"] = $errors;

            header("Location: ./famMembers_add.php?familyId=$familyId");
            // reset pdo
            $pdo = null;
            $stmt = null;
            die();
        }

        // signup user + return to login
        create_familyMember($pdo, $familyId, $fName, $lName, $birthday, $membership);

        header("Location: ../famMembers.php?familyId=$familyId&memberAdded=success");

        // clear signup data
        unset($_SESSION["family_add_data"]);
        // reset pdo
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query error: " . $e->getMessage());
    }

} else {
    header("Location: f_add.php");
    die();
}