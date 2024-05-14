<?php
if (
    $_SERVER["REQUEST_METHOD"] === "POST"
) {
    $bookyear = $_POST["bookyears_filter"];
    try {
        require_once '../../db/connection.php';
        require_once 'bookyears_model.php';
        require_once 'bookyears_functions.php';

        $bookyears = get_years($pdo);

        if (!isset($bookyear)) {
            $results = get_contributions($pdo);
        } else if ($bookyear === "all") {
            $results = get_contributions($pdo);
        } else if ($bookyear === "empty") {
            $results = get_contributions($pdo);
        } else {
            $results = get_filtered_contributions($pdo, $bookyear);
        }

        // activate session
        require_once ("../../includes/session.php");
        $_SESSION["bookyears_data"] = $results;
        $_SESSION["bookyears_years"] = $bookyears;


        // return to home
        header("Location: bookyears.php");
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