<?php
session_start();
require_once "header.view.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- links -->
    <!-- path fixes different folder paths -->
    <link rel="stylesheet" href="<?php echo $path ?>assets/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    <title>Leden Administratie -
        <?php echo $title ?>
    </title>
</head>

<body>
    <header class="header">
        <div class="header_wrapper | container">
            <p class="logo">&#128393; &nbsp;&nbsp; LedenAdministratie</p>
            <?php

            // if logged-in show nav
            if (isset($_SESSION["user_username"])) { ?>
                <nav>
                    <form action="<?php echo $path; ?>index.php" method="post">
                        <button class="btn link">Home</button>
                    </form>
                    <form action="/LedenAdministratie/pages/bookyears/bookyears_contr.php" method="post">
                        <button class="btn link">Boekingen</button>
                    </form>
                </nav>
                <!-- show username -->
                <div class="user">
                    <?php output_username() ?>
                    <form action="<?php echo $path; ?>registration/logout/logout.php">
                        <button class="btn white">Uitloggen</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </header>