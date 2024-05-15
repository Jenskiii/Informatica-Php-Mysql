<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $surname = strtolower($_POST["family_achternaam"]);
    $residence = strtolower($_POST["family_woonplaats"]);
    $address = strtolower($_POST["family_straatnaam"]);
    $zipcode = strtoupper($_POST["family_postcode"]);

    try {
        require_once '../../../db/connection.php';
        require_once 'f_add_model.php';
        require_once 'f_add_functions.php';
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
        if (is_address_taken($pdo, $address)) {
            $errors["address_isTaken"] = "Adres is al ingebruik!";
        }

        if (is_zipcode_invalid($zipcode)) {
            $errors["invalid_zipcode"] = "Ongeldig postcode!";
        }



        // bind error to session  var + return to signup page
        require_once ("../../../includes/session.php");
        if ($errors) {
            $_SESSION["errors_family_add"] = $errors;

            // save data into array so it can be used to pre-fill inputs on error
            $familyAddData = [
                "surname" => $surname,
                "residence" => $residence,
                "address" => $address,
                "zipcode" => $zipcode,
            ];

            $_SESSION["family_add_data"] = $familyAddData;

            // return to page
            header("Location: ./f_add.php");
            // reset pdo
            $pdo = null;
            $stmt = null;
            die();
        }

        // signup user + return to login
        create_family($pdo, $surname, $residence, $address, $zipcode);
        header("Location: ../../../index.php?familyAdded=success");

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