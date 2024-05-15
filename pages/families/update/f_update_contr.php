<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // click family id
    $familyId = $_GET["familyId"];
    try {
        require_once '../../../db/connection.php';
        require_once 'f_update_model.php';
        require_once 'f_update_functions.php';
        require_once '../families_form_validation.php';


        $result = get_family($pdo, $familyId);

        // bind error to session + return to signup page
        require_once ("../../../includes/session.php");

        // bind fetched data to array so inputs are auto filled with current data
        $updateData = [
            "surname" => $result["achternaam"],
            "residence" => $result["woonplaats"],
            "address" => $result["adres"],
            "zipcode" => $result["postcode"],
            "id" => $familyId,
        ];

        $_SESSION["update_data"] = $updateData;

        header("Location: f_update.php");

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