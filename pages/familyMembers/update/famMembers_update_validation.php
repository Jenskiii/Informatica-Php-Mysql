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

        if (is_input_empty($fName, $birthday, $membership)) {
            $errors["empty_input"] = "Alle velden verplicht!";
        }
        if (is_firstname_invalid($fName)) {
            $errors["invalid_firstname"] = "Voornaam kan geen nummers bevatten!";
        }


        // bind error to session + return to page
        require_once ("../../../includes/session.php");
        if ($errors) {
            $_SESSION["errors_famMembers_update"] = $errors;

            header("Location: ./famMembers_update.php?familyId=$familyId");
            // reset pdo
            $pdo = null;
            $stmt = null;
            die();
        }


        // update family member
        update_familyMember($pdo, $id, $fName, $birthday, $membership);

        // calculate updated booking values
        $age = calculate_age($birthday);
        $ageDiscount = calculate_age_discount($age);
        $memberDiscount = get_membership_discount($pdo, $membership);
        $price = calculate_price($memberDiscount["korting"], $ageDiscount);

        // update booking
        update_booking($pdo, $id, $fName, $age , $membership, $price);


        // return to fammembers page
        header("Location: ../famMembers.php?familyId=$familyId&memberUpdated=success");

        // reset pdo
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query error" . $e->getMessage());
    }

} else {
    header("Location: famMembers_update.php");
    die();
}