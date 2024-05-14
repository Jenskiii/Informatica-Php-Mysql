<?php
$title = 'boekingen';
$path = '../../';
require_once '../../includes/header.php';
require_once '../../db/connection.php';
require_once 'bookyears_view.php';
?>


<!-- content -->
<main>
    <section class="bookyears" aria-labelledby="bookyears_title">
        <h1 class="heading-1" id="familyMembers_title">Boekingen</h1>
        <div class="container">

            <form action="./bookyears_contr.php" method="post">
                <div class="search-filter | form-group">
                    <select name='bookyears_filter' id='bookyears_filter'>
                        <option value='empty'>Kies filter</option>
                        <option value='all'>Alle boekingen</option>;
                        <?php fill_year_options(); ?>
                    </select>
                    <button type="submit" class="btn">Filteren</button>
                </div>
            </form>


            <div class="bookyears_bookings">
                <h2>Geselecteerde boekingen</h2>
                <div class="bookyears_grid">
                    <?php show_contributions() ?>
                </div>
            </div>

        </div>
    </section>


</main>

<?php require_once '../../includes/footer.php'; ?>