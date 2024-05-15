<?php
function is_signup_successful($url)
{
    if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<div class="prompt success">
                 <p>Registreren gelukt!<p>
              </div>';

        header("Refresh: 4; URL=$url");
    }
}

function check_login_errors()
{
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        foreach ($errors as $error) {
            echo "<p class='error-msg'>" . $error . "</p >";
        }
        // clean session
        unset($_SESSION["errors_login"]);
    }
}


function return_to_home_page()
{
    if (!empty($_SESSION["user_username"])) {
        header("Location: ../../index.php");
        die();
    }
}