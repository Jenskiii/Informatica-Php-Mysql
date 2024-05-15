<?php
// create family member
function create_familyMember($pdo, $familyId, $fName, $lName, $birthday, $membership)
{
    set_familyMember($pdo, $familyId, $fName, $lName, $birthday, $membership);
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
