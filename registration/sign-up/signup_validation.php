<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["gebruikersnaam"];
    $pwd = $_POST["wachtwoord"];
    $pwdConfirm = $_POST["wachtwoord_bevestigen"];
    $email = $_POST["email"];

    try {
        // link db + functions
        require_once ("../../db/connection.php");
        require_once ("./signup_model.php");
        require_once ("./signup_functions.php");

        // FORM VALIDATION
        $errors = [];

        if (is_input_empty($username, $pwd, $email, $pwdConfirm)) {
            $errors["empty_input"] = "Alle velden verplicht!";
        }
        
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Gebruikersnaam is al ingebruik!";
        }

        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Ongeldig e-mailadres!";
        }

        if (is_email_taken($pdo, $email)) {
            $errors["email_is_taken"] = "E-mailadres is al ingebruik!";
        }

        if (is_password_invalid($pwd)) {
            $errors["invalid_pwd"] = "Wachtwoord moet uit minstens 8 karakters bestaan,
            een hoofdletter, en een nummer";
        }

        if (do_passwords_match($pwd, $pwdConfirm)) {
            $errors["pwd_match"] = "wachtwoorden komen niet overheen";
        }



        // bind error to session + return to signup page
        require_once ("../../includes/session.php");
        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email,
            ];

            $_SESSION["signup_data"] = $signupData;

            header("Location: ./signup.php");
            die();
        }

        // signup user + return to login
        create_user($pdo, $username, $email, $pwd);
        header("Location: ../login/login.php?signup=success");

        // clear signup data
        unset($_SESSION["signup_data"]);

        // reset pdo
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query error" . $e->getMessage());
    }
} else {
    header("Location: ../../index.php");
    die();
}


