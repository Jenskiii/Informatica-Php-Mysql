<?php
$title = 'Add family';
$path = '../../../';
require_once '../../../includes/header.php';
require_once '../../../includes/session.php';
require_once 'f_update_view.php';
?>

<!-- content -->
<main class="add_family | container center-main">

    <!-- return to login -->
    <a class="btn back-btn" href="../../../index.php">&lArr;</a>

    <h1 class="heading-1 mb-1 center-text">Familie aanpassen</h1>

    <!-- show errors -->
    <?php check_family_update_errors(); ?>

    <!-- form -->
    <form class="form" action="f_update_validation.php" method="post" novalidate>
        <div class="form-group">
            <label for="f_update_achternaam">Achternaam:*</label>
            <?php familyUpdate_fill_surname() ?>
        </div>

        <div class="form-group">
            <label for="f_update_woonplaats">Woonplaats:*</label>
            <?php familyUpdate_fill_residence() ?>
        </div>

        <div class="form-group">
            <label for="f_update_straatnaam">Straatnaam en huisnummer:*</label>
            <?php familyUpdate_fill_address() ?>
        </div>

        <div class="form-group">
            <label for="f_update_postcode">Postcode <small>(1111AP)</small>:*</label>
            <?php familyUpdate_fill_zipcode() ?>
        </div>
        <input type="hidden" name="family_update_id" id="family_update_id" value="<?php get_family_id(); ?>">
        <button class="btn" type="submit">Aanpassen</button>
    </form>
</main>

<?php require_once '../../../includes/footer.php'; ?>