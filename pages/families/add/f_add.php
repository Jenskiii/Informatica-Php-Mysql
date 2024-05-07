<?php
$title = 'Add family';
$path = '../../../';
require_once '../../../includes/header.php';
require_once 'f_add_view.php';

?>

<!-- content -->
<main class="add_family | container center-main">

    <!-- return to login -->
    <a class="btn back-btn" href="../../../index.php">&lArr;</a>

    <h1 class="heading-1 mb-1 center-text">Familie toevoegen</h1>

    <!-- show errors -->
    <?php check_family_add_errors() ?>

    <form class="form" action="f_add_validation.php" method="post" novalidate>
        <div class="form-group">
            <label for="family_achternaam">Achternaam:*</label>
            <?php familyAdd_fill_surname() ?>
        </div>

        <div class="form-group">
            <label for="family_woonplaats">Woonplaats:*</label>
            <?php familyAdd_fill_residence() ?>
        </div>

        <div class="form-group">
            <label for="family_straatnaam">Straatnaam en huisnummer:*</label>
            <?php familyAdd_fill_address() ?>
        </div>

        <div class="form-group">
            <label for="family_postcode">Postcode <small>(1111AP)</small>:*</label>
            <?php familyAdd_fill_zipcode() ?>
        </div>

        <button class="btn" type="submit">Toevoegen</button>
    </form>
</main>


<?php require_once '../../../includes/footer.php'; ?>