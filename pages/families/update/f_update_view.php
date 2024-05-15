<?php
// show errors if form validation is invalid
function check_family_update_errors()
{
    if (isset($_SESSION['errors_family_update'])) {
        $errors = $_SESSION['errors_family_update'];


        foreach ($errors as $error) {
            echo "<p class='error-msg'>" . $error . "</p >";
        }

        // remove session var
        unset($_SESSION['errors_family_update']);
    }
}

// FILL INPUT VALUES
function familyUpdate_fill_surname()
{
    echo '<input type="text" id="f_update_achternaam" name="f_update_achternaam" placeholder="Jansen" value="'
        . htmlentities($_SESSION["update_data"]["surname"]) . '" autofocus>';

}
function familyUpdate_fill_residence()
{
    echo '<input type="text" id="f_update_woonplaats" name="f_update_woonplaats" placeholder="Hengelo" value="'
        . htmlentities($_SESSION["update_data"]["residence"]) . '">';
}

function familyUpdate_fill_address()
{
    echo '<input type="text" id="f_update_straatnaam" name="f_update_straatnaam" value="'
        . htmlentities($_SESSION["update_data"]["address"]) . '" placeholder="Harrystraat 22">';
}
function familyUpdate_fill_zipcode()
{
    echo ' <input type="text" id="f_update_postcode" name="f_update_postcode" value="'
        . htmlentities($_SESSION["update_data"]["zipcode"]) . '" placeholder="1111AP" maxlength="6">';
}

function get_family_id()
{
    echo $_SESSION["update_data"]["id"];
}