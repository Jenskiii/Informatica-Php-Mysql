<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // click family id
    $familyMemberId = $_POST["update_familyMember_id"];

    try {
        require_once '../../../db/connection.php';
        require_once 'famMembers_update_model.php';
        require_once 'famMembers_update_functions.php';

        // fetch data
        $memberships = get_memberships($pdo);
        $result = get_familyMember($pdo, $familyMemberId);

        // store data
        $updateData = [
            "fName" => $result["voornaam"],
            "lName" => $result["achternaam"],
            "birthday" => $result["geboortedatum"],
            "membership" => $result["lidmaatschap"],
            "familyId" => $result["familie_id"],
            "memberId" => $result["id"],
        ];

        // bind data to session var
        require_once ("../../../includes/session.php");
        $_SESSION["famMembers_update_data"] = $updateData;
        $_SESSION["famMembers_update_membership"] = $memberships;

        // return to page
        header('Location: famMembers_update.php?familyId='.$result["familie_id"].'');

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