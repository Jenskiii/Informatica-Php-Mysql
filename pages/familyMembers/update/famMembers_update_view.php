<?php
// input with filled with data from db
function fill_fName_input()
{
    echo '<input type="text" name="famMembers_update_fName" id="famMembers_update_fName" 
    value="' . $_SESSION["famMembers_update_data"]["fName"] . '">';
}
function fill_membership_input()
{
    echo '<input type="text" name="famMembers_update_membership" id="famMembers_update_membership" 
    value="' . $_SESSION["famMembers_update_data"]["membership"] . '">';
}
function fill_birthday_input()
{
    echo '<input type="date" name="famMembers_update_birthday" id="famMembers_update_birthday" 
    value="' . $_SESSION["famMembers_update_data"]["birthday"] . '">';
}


// create <select> for memberships
function fill_membership_option()
{
    $memberships = $_SESSION["famMembers_update_membership"];

    echo "<select name='famMembers_update_membership' id='famMembers_update_membership'>";
    foreach ($memberships as $membership) {
        // sets standard lid as basic value
        if ($membership["omschrijving"] === $_SESSION["famMembers_update_data"]["membership"]) {
            echo '<option value="' . $membership["omschrijving"] . '" selected>' . $membership["omschrijving"] . '</option>';
        } else {
            echo '<option value="' . $membership["omschrijving"] . '">' . $membership["omschrijving"] . '</option>';
        }
    }
    echo "</select>";
}

// input for family id
function fill_familyId_input()
{
    echo '<input type="hidden" name="famMembers_update_familyId" id="famMembers_update_familyId" 
    value="' . $_SESSION["famMembers_update_data"]["familyId"] . '">';
}

// input for familymember id
function fill_familyMemberId_input()
{
    echo '<input type="hidden" name="famMembers_update_memberId" id="famMembers_update_memberId" 
    value="' . $_SESSION["famMembers_update_data"]["memberId"] . '">';
}

// show errors
function check_signup_errors()
{
    if (isset($_SESSION['errors_famMembers_update'])) {
        $errors = $_SESSION['errors_famMembers_update'];


        foreach ($errors as $error) {
            echo "<p class='error-msg'>" . $error . "</p >";
        }

        // remove session var
        unset($_SESSION['errors_famMembers_update']);
    }
}
