<?php
// show family add errors
function check_family_add_errors()
{
    if (isset($_SESSION['errors_family_add'])) {
        $errors = $_SESSION['errors_family_add'];


        foreach ($errors as $error) {
            echo "<p class='error-msg'>" . $error . "</p >";
        }

        // remove session var
        unset($_SESSION['errors_family_add']);
    }
}


// FILL INPUT VALUES
function familyAdd_fill_surname()
{
    // username 
    if (
        isset($_SESSION["family_add_data"]["surname"]) &&
        !isset($_SESSION["errors_family_add"]['invalid_surname'])
    ) {
        echo '<input type="text" id="family_achternaam" name="family_achternaam" placeholder="Jansen" value="'
            . $_SESSION["family_add_data"]["surname"] . '" autofocus>';
    } else {
        echo '<input type="text" id="family_achternaam" name="family_achternaam" placeholder="Jansen" autofocus>';
    }

}
function familyAdd_fill_residence()
{
    // username 
    if (
        isset($_SESSION["family_add_data"]["residence"]) &&
        !isset($_SESSION["errors_family_add"]['invalid_residence'])
    ) {
        echo '<input type="text" id="family_woonplaats" name="family_woonplaats" placeholder="Hengelo" value="'
            . $_SESSION["family_add_data"]["residence"] . '">';
    } else {
        echo '<input type="text" id="family_woonplaats" name="family_woonplaats" placeholder="Hengelo">';
    }

}
function familyAdd_fill_address()
{
    // username 
    if (
        isset($_SESSION["family_add_data"]["address"]) &&
        !isset($_SESSION["errors_family_add"]['invalid_address'])
    ) {
        echo '<input type="text" id="family_straatnaam" name="family_straatnaam" value="'
            . $_SESSION["family_add_data"]["address"] . '" placeholder="Harrystraat 22">';
    } else {
        echo '<input type="text" id="family_straatnaam" name="family_straatnaam" placeholder="Harrystraat 22">';
    }

}
function familyAdd_fill_zipcode()
{
    // username 
    if (
        isset($_SESSION["family_add_data"]["zipcode"]) &&
        !isset($_SESSION["errors_family_add"]['invalid_zipcode'])
    ) {
        echo ' <input type="text" id="family_postcode" name="family_postcode" value="'
            . $_SESSION["family_add_data"]["zipcode"] . '" placeholder="1111AP" maxlength="6">';
    } else {
        echo ' <input type="text" id="family_postcode" name="family_postcode" placeholder="1111AP" maxlength="6">';
    }

}

