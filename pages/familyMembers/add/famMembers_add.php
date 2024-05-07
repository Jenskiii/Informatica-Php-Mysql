<?php
$title = 'Familielid toevoegen';
$path = '../../../';
require_once '../../../includes/header.php';
require_once 'famMembers_add_view.php';
?>

<!-- content -->
<main class="add_family | container center-main">

    <!-- return to memberpage -->
    <a class="btn back-btn" href="../famMembers.php?familyId=
    <?php echo $_GET["familyId"] ?>">&lArr;</a>

    <h1 class="heading-1 mb-1 center-text">Familielid toevoegen</h1>


    <!-- form -->
    <form class="form" action="famMembers_add_validation.php" method="post" novalidate>
        <!-- firstname -->
        <div class="form-group">
            <label for="family_achternaam">Voornaam:*</label>
            <input type="text" name="famMember_add_fName" id="famMember_add_fName">
        </div>

        <div class="form-group">
            <label for="family_straatnaam">Lidmaatschap:*</label>
            <select name="famMember_add_membership" id="famMember_add_membership">
                <!-- membership options -->
                <?php fill_membership_options() ?>
            </select>
        </div>

        <div class="form-group">
            <label for="family_woonplaats">Geboortedatum:*</label>
            <input type="date" name="famMember_add_birthday" id="famMember_add_birthday">
        </div>

        <!-- hidden values that will insert automaticly -->
        <!-- family id / family name -->
        <?php fill_familyId() ?>
        <?php fill_familyName() ?>

        <button class="btn" type="submit">Toevoegen</button>
    </form>
</main>

<!-- footer -->
<?php require_once '../../../includes/footer.php'; ?>