<!-- import header -->
<?php

$title = 'Aanmelden';
$path = '../../';

require_once '../../includes/header.php';
require_once '../../includes/session.php';
require_once './signup_view.php';
?>

<!-- content -->
<main class="signup | container center-main">

    <!-- return to login -->
    <a class="btn back-btn" href="../../index.php">&lArr;</a>

    <h1 class="heading-1 mb-1 center-text">Aanmelden</h1>

    <!-- errors -->
    <?php check_signup_errors() ?>

    <!-- form -->
    <form class="form" action="signup_validation.php" method="post" novalidate>
        <div class="form-group">
            <label for="gebruikersnaam">Gebruikersnaam:*</label>
            <?php signup_fill_username()?>
        </div>

        <div class="form-group">
            <label for="email">Email:*</label>
            <?php signup_fill_email()?>
        </div>

        <div class="form-group">
            <label for="wachtwoord">Wachtwoord:*</label>
            <input type="password" id="wachtwoord" name="wachtwoord">
        </div>

        <div class="form-group">
            <label for="wachtwoord_bevestigen">Wachtwoord bevestigen:*</label>
            <input type="password" id="wachtwoord_bevestigen" name="wachtwoord_bevestigen">
        </div>

        <button class="btn" type="submit">Aanmelden</button>
    </form>
</main>
<!-- import footer -->
<?php require_once '../../includes/footer.php'; ?>