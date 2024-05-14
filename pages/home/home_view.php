<?php
require_once 'home_model.php';
require_once 'home_functions.php';
// prints card of each familie
function print_families($pdo)
{
    // selects all families
    $families = get_families($pdo);

    if (empty($families)) {
        echo "<h2 class='heading-2 center'>Voeg een familie toe</h2>";
    } else {
        foreach ($families as $family) { ?>
            <!-- get all contributions of each family -->
            <?php $contributions = get_contribution($pdo, $family["id"]); ?>

            <div class="card">
                <!-- card information -->
                <div class="card_information">
                    <p><span>Family: </span><?php echo htmlentities(ucfirst($family["achternaam"])) ?></p>
                    <p><span>Adres: </span><?php echo htmlentities(ucfirst($family["adres"])) ?></p>
                    <p><span>Postcode: </span><?php echo htmlentities(ucfirst($family["postcode"])) ?></p>

                    <!-- calculate total contribution of all family members together -->
                    <p><span>Totaal bedrag:</span> &euro; <?php echo calculate_total_contribution($contributions); ?></p>
                </div>

                <!-- got to family members -->
                <form class="card_redirect" action="./pages/familyMembers/famMembers.php?familyId=
                    <?php echo htmlentities($family["id"]) ?>" method="post">
                    <button class="btn blue">Bekijk</button>
                </form>
                <!-- update family -->
                <form class="card_update" action="./pages/families/update/f_update_contr.php?familyId=
                    <?php echo htmlentities($family["id"]) ?>" method="post">
                    <button class="btn green">Aanpassen</button>
                </form>

                <!-- delete family -->
                <form class="card_delete" action="./pages/families/delete/f_delete.php" method="post">
                    <input type="hidden" name="delete_family_id" id="delete_family_id"
                        value="<?php echo htmlentities($family["id"]) ?>">
                    <button class="btn">&#10006;</button>
                </form>
            </div>
        <?php }
    }
}

function is_handled_successful($url)
{
    if (isset($_GET["delete"]) && $_GET["delete"] === "success") {
        echo '<div class="prompt deleted">
                    <p>Familie succesvol verwijdert!<p>
                </div>';
        header("Refresh: 2.5; URL=$url");
    } else if (isset($_GET["familyAdded"]) && $_GET["familyAdded"] === 'success') {
        echo '  <div class="prompt success">
                  <p>Familie succesvol toegevoegd!</p>
                </div>';
        header("Refresh: 2.5; URL=$url");
    } else if (isset($_GET["familyDeleteError"]) && $_GET["familyDeleteError"] === 'fail') {
        echo '  <div class="prompt deleted">
                  <p>Eerst alle familieleden verwijderen!</p>
                </div>';
        header("Refresh: 4; URL=$url");
    }


}