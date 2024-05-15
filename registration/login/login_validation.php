<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // username + pwd
    $username = $_POST["gebruikersnaam_login"];
    $pwd = $_POST["wachtwoord_login"];

    try {
        // connection
        require_once '../../db/connection.php';
        require_once './login_model.php';
        require_once './login_functions.php';

        // FORM VALIDATION
        $errors = [];
        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Alle velden verplicht!";
        }

        //   get user from db
        $result = get_user($pdo, $username);

        // validate username
        if (is_username_invalid($result) && !empty($username)) {
            $errors["username_incorrect"] = "Gebruikersnaam is fout!";
        }

        // validate pwd
        if (
            !is_username_invalid($result) &&
            is_pwd_invalid($pwd, $result["wachtwoord"])
        ) {
            $errors["pwd_incorrect"] = "Wachtwoord is fout!";
        }

        // bind error to session + return to signup page
        require_once ("../../includes/session.php");

        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("Location: ../../index.php");
            die();
        }

        // create session var for username
        $_SESSION["user_username"] = htmlspecialchars($result["gebruikersnaam"]);

        // go to home page after login
        header("Location: ../../index.php");

        // close connection
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
