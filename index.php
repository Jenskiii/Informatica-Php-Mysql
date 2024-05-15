<?php
$title = 'Home';
$path = './';
require_once "./includes/header.php";
require_once "./db/connection.php";
require_once "./pages/home/home_view.php";
return_to_login();
?>

<main class="main_start">
    <section class="home-search | container" aria-labelledby="families-title">

        <h1 id="families-title" class="heading-1">Home</h1>

        <?php is_handled_successful("index.php"); ?>


        <!-- add familie's -->
        <form action="./pages/families/add/f_add.php">
            <button type="submit" class="btn green">Familie toevoegen</button>
        </form>


        <!-- home grid -->
        <div class="home-grid">
            <?php print_families($pdo) ?>
        </div>
    </section>
</main>

<?php require_once "./includes/footer.php"; ?>