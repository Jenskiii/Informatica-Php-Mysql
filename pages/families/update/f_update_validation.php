<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $surname = strtolower($_POST["f_update_achternaam"]);
    $residence = strtolower($_POST["f_update_woonplaats"]);
    $address = strtolower($_POST["f_update_straatnaam"]);
    $zipcode = strtoupper($_POST["f_update_postcode"]);
    $familyId = $_POST["family_update_id"];

    try {
        require_once '../../../db/connection.php';
        require_once 'f_update_model.php';
        require_once 'f_update_functions.php';
        require_once '../families_form_validation.php';

        // FORM VALIDATION
        $errors = [];

        if (is_input_empty($surname, $residence, $address, $zipcode)) {
            $errors["empty_input"] = "Alle velden verplicht!";
        }

        if (is_surname_invalid($surname)) {
            $errors["invalid_surname"] = "Achternaam kan geen nummers bevatten!";
        }

        if (is_residence_invalid($residence)) {
            $errors["invalid_residence"] = "Woonplaats kan geen nummers bevatten!";
        }

        if (is_address_invalid($address)) {
            $errors["invalid_address"] = "Ongeldig adres!";
        }

        if (is_address_taken($pdo, $familyId, $address)) {
            $errors["address_isTaken"] = "Adres is al ingebruik!";
        }

        if (is_zipcode_invalid($zipcode)) {
            $errors["invalid_zipcode"] = "Ongeldig postcode!";
        }



        // bind error to session + return to signup page
        require_once ("../../../includes/session.php");
        if ($errors) {
            $_SESSION["errors_family_update"] = $errors;

            $familyUpdateData = [
                "surname" => $surname,
                "residence" => $residence,
                "address" => $address,
                "zipcode" => $zipcode,
            ];

            $_SESSION["family_update_data"] = $familyUpdateData;

            header("Location: ./f_update.php");
            // reset pdo
            $pdo = null;
            $stmt = null;
            die();
        }

        // update family information
        update_family($pdo, $familyId, $surname, $residence, $address, $zipcode);

        // update all family member names
        update_familyMember_names($pdo, $familyId, $surname);

        // update booking
        echo  "jansen".$familyId;
        update_booking($pdo, $familyId, $surname);

        header("Location: ../../../index.php");

        // clear signup data
        unset($_SESSION["family_update_data"]);
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