<?php
// fill input value after wrong submit
function signup_fill_username()
{
    // username 
    if (
        isset($_SESSION["signup_data"]["username"]) &&
        !isset($_SESSION['errors_signup']['username_taken'])
    ) {
        echo '<input type="text" id="gebruikersnaam" name="gebruikersnaam" autofocus value="' . $_SESSION["signup_data"]["username"] . '">';
    } else {
        echo '<input type="text" id="gebruikersnaam" name="gebruikersnaam" autofocus>';
    }

}
function signup_fill_email()
{
    // email
    if (
        isset($_SESSION["signup_data"]["username"]) &&
        !isset($_SESSION['errors_signup']['email_used'])
        && !isset($_SESSION['errors_signup']['invalid_email'])
    ) {
        echo '<input type="email" id="email" name="email" value="' . $_SESSION["signup_data"]["email"] . '">';
    } else {
        echo '<input type="email" id="email" name="email">';
    }

}


// show email errors
function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];


        foreach ($errors as $error) {
            echo "<p class='error-msg'>" . $error . "</p >";
        }

        // remove session var
        unset($_SESSION['errors_signup']);
    }
}

