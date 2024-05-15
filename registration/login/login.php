<!-- import header -->
<?php
$title = 'Login';
$path = '../../';
require_once '../../includes/header.php';
require_once '../../includes/session.php';
require_once 'login_view.php';

// prevents going back to login page after being logged in
return_to_home_page();
?>


<!-- content -->
<main class="container center-main">
    <!-- prompt message -->
    <?php is_signup_successful("login.php") ;?>

    <h1 class="heading-1 mb-1 center-text">Log in</h1>

    <!-- errormsg's -->
    <?php check_login_errors() ?>

    <form class="form" action="login_validation.php" method="post">
        <div class="form-group">
            <label for="gebruikersnaam_login">Gebruikersnaam:*</label>
            <input type="text" id="gebruikersnaam_login" name="gebruikersnaam_login" placeholder="pietjebel12"
                autofocus>
        </div>
        <div class="form-group">
            <label for="wachtwoord_login">Wachtwoord:*</label>
            <input type="password" id="wachtwoord_login" name="wachtwoord_login" placeholder="***********">
        </div>

        <p class="center-text">Nog geen account ?
            &nbsp;&nbsp;<a class="link" href="../sign-up/signup.php">aanmelden</a>
        </p>
        <button class="btn" type="submit">Log in</button>
    </form>

</main>


<!-- import footer -->
<?php require_once '../../includes/footer.php'; ?>