<?php
$title = 'Familieleden';
$path = '../../';
require_once '../../includes/header.php';
require_once '../../db/connection.php';
require_once 'famMembers_view.php';
?>


<!-- content -->
<main>
    <section class="familyMembers" aria-labelledby="familyMembers_title">
        <h1 class="heading-1" id="familyMembers_title">Familie-leden</h1>
        <div class="container">

        <!-- prompt message if added / deleted -->
            <?php is_handled_successful('famMembers.php?familyId=' . $_GET["familyId"] . '') ?>

            <!-- return to login -->
            <div class="space-between">
                <a class="btn" href="../../index.php"> &lArr; </a>

                <!-- add familymember -->
                <form action="./add/famMembers_add_contr.php" method="post">
                    <input type="hidden" value="<?php echo $_GET["familyId"] ?>" name="famMembers_add_familyId">
                    <button class="btn green">lid toevoegen</button>
                </form>
            </div>

            <?php show_family_members($pdo, $_GET["familyId"]); ?>
        </div>
    </section>
</main>


<?php require_once '../../includes/footer.php'; ?>