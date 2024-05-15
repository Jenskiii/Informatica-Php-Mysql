<?php
$title = 'Add family';
$path = '../../../';
require_once '../../../includes/header.php';
require_once '../../../includes/session.php';
require_once 'famMembers_update_view.php';
?>

<!-- content -->
<main >

    <section class="add_family | container center-main" aria-labelledby="add_family_title">
        <!-- return to login -->
        <a class="btn back-btn" href="../famMembers.php?familyId=<?php echo $_GET["familyId"] ?>">&lArr;</a>
        <h1 class="heading-1 mb-1 center-text" id="add_family_title">Familielid aanpassen</h1>
        <!-- errors -->
        <?php check_signup_errors() ?>
        <!-- form -->
        <form class="form" action="famMembers_update_validation.php" method="post" novalidate>
            <div class="form-group">
                <label for="f_update_achternaam">Voornaam:*</label>
                <?php fill_fName_input() ?>
            </div>
            <div class="form-group">
                <label for="f_update_woonplaats">Geboortedatum:* <small>(11/22/1990)</small></label>
                <?php fill_birthday_input() ?>
            </div>
            <div class="form-group">
                <label for="f_update_straatnaam">Lidmaatschap:*</label>
                <?php fill_membership_option() ?>
            </div>
            <?php fill_familyId_input() ?>
            <?php fill_familyMemberId_input() ?>
        
        
            <button class="btn" type="submit">Aanpassen</button>
        </form>
    </section>
</main>

<!-- footer -->
<?php require_once '../../../includes/footer.php'; ?>