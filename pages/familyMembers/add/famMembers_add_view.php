<?php
// input for fam name
function fill_familyName()
{
    echo '<input type="hidden" name="famMember_add_lName" id="famMember_add_lName" 
    value="' . $_SESSION["famMembers_add_famData"]["achternaam"] . '">';
}

// input for fam id
function fill_familyId()
{
    echo '<input type="hidden" name="famMember_add_familyId" id="famMember_add_familyId" 
    value="' . $_SESSION["famMembers_add_famData"]["id"] . '">';
}

// option for all membership options
function fill_membership_options()
{
    $memberships = $_SESSION["famMembers_add_memberships"];

    foreach ($memberships as $membership) {

        // sets standard lid as basic value
        if ($membership["omschrijving"] === "Standaard lid") {
            echo '<option value="' . $membership["omschrijving"] . '" selected>' . $membership["omschrijving"] . '</option>';
        } else {
            echo '<option value="' . $membership["omschrijving"] . '">' . $membership["omschrijving"] . '</option>';
        }

    }
}

// show errors
function check_signup_errors()
{
    if (isset($_SESSION['famMembers_add_errors'])) {
        $errors = $_SESSION['famMembers_add_errors'];


        foreach ($errors as $error) {
            echo "<p class='error-msg'>" . $error . "</p >";
        }

        // remove session var
        unset($_SESSION['famMembers_add_errors']);
    }
}