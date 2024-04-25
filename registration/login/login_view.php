<?php
function is_signup_successful()
{
    if (isset($_GET["signup"]) && $_GET["signup"] === "succes") {
        echo '<div class="prompt succes">
                 <p>Aanmelden gelukt!<p>
              </div>';
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


function return_to_home_page(){
    if (!empty($_SESSION["user_username"])){
        header("Location: ../../index.php");
        die();
    }
}