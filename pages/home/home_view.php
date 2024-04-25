<?php
 require_once 'home_model.php';
 require_once 'home_functions.php';
// prints card of each familie
function print_families($pdo)
{
    // selects all families
    $families = get_families($pdo);

    if (empty($families)) {
        echo "<p>Voeg een familie toe</p>";
    } else {
        foreach ($families as $familie) { ?>
            <div class="card">
                <p><?php echo htmlentities($familie["achternaam"]) ?></p>
                <p>Totale contributie: </p>
                <form action="./pages/family/family_validation.php" method="post">
                    <input type="hidden" name="family_id" id="family_id"
                        value="<?php echo htmlentities($familie["id"]) ?>">
                    <button>Bekijk</button>
                </form>
            </div>
        <?php }
    }
}