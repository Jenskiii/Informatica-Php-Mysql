<?php
// update family with new values
function update_familyMember($pdo, $id, $fName, $birthday, $membership)
{
    set_familyMember($pdo, $id, $fName, $birthday, $membership);
}
// VALIDATION
function is_input_empty($fName, $birthday, $membership)
{
    if (empty($fName) || empty($birthday) || empty($membership)) {
        return true;
    } else {
        return false;
    }
}

function is_firstname_invalid($fName)
{
    $number = preg_match('@[0-9]@', $fName);
    if ($number) {
        return true;
    } else {
        return false;
    }
}


// convert birthday to age
function calculate_age($birthday)
{
    //explode the date to get month, day and year
    $dateOfBirth = $birthday;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));

    return $diff->format('%y');
}


// calculate the discount
function calculate_age_discount($age)
{
    $discount = 0;
    if ($age < 8) {
        $discount = 50;
    } else if ($age >= 8 && $age <= 12) {
        $discount = 40;
    } else if ($age >= 13 && $age <= 17) {
        $discount = 25;
    } else if ($age >= 18 && $age <= 50) {
        $discount = 0;
    } else if ($age >= 51) {
        $discount = 45;
    }

    return $discount;
}

// calulate the total price
function calculate_price($membership, $discount)
{
    $basePrice = 100;

    $memberPrice = $basePrice - ($basePrice * ($membership / 100));

    $totalPrice = $memberPrice - ($memberPrice * ($discount / 100));

    return $totalPrice;
}

// update booking
function update_booking($pdo, $id, $fName, $age, $membership, $price)
{
    set_updated_booking($pdo, $id, $fName, $age, $membership, $price);
}