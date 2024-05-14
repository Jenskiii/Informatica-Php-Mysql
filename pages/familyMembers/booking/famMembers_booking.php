<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $familyId = $_POST["booking_family_id"];
    $memberId = $_POST["booking_familyMember_id"];

    try {
        require_once '../../../db/connection.php';
        require_once 'famMembers_booking_model.php';
        require_once 'famMembers_booking_functions.php';

        // get clicked member
        $member = get_familyMember($pdo, $memberId);

        // collect member data
        $memberId = $member["id"];
        $age = calculate_age($member["geboortedatum"]);
        $membership = $member["lidmaatschap"];
        $bookyear = date("Y");
        $fullName = "$member[voornaam] $member[achternaam]";

        // used to calculate contribution price
        $ageDiscount = calculate_age_discount($age);
        $membershipDiscount = get_membership_discount($pdo, $membership);
        $price = calculate_price($membershipDiscount["korting"], $ageDiscount);

        // fetches all bookyears
        $bookyearResults = get_current_bookyears($pdo);

        // checks if multidimensional array contains given value
        $searchKey = 'jaar';
        $searchValue = strval($bookyear);
        $result = array_filter($bookyearResults, function ($subarray) use ($searchKey, $searchValue) {
            return isset ($subarray[$searchKey]) && $subarray[$searchKey] === $searchValue;
        });

        // if year doesn't excist / create 'jaar' inside 'boekjaar' 
        if (empty($result)) {
            create_bookyear($pdo, $bookyear);
        }

        // create contribution
        create_contribution($pdo, $memberId, $familyId, $fullName, $age, $membership, $price, $bookyear);

        header("Location: ../famMembers.php?familyId=$familyId&memberBooked=success");

        // reset pdo
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        if ($e->errorInfo[1] === 1062) {
        header("Location: ../famMembers.php?familyId=$familyId&bookingError=fail");
        // reset pdo
        $pdo = null;
        $stmt = null;
        die();
        } else {
            die("Query error" . $e->getMessage());
        }

    }

} else {
    header("Location: ../famMembers.php");
    die();
}
