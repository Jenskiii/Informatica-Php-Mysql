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
        <form class="search-bar" action="" method="post">
            <label for="search-family">
                <img src="./assets/images/icon-search.svg" alt="search icon">
                <input type="search" name="search-family" id="search-family">
            </label>
            <button class="btn">Zoeken</button>
        </form>


        <div class="home-grid">
            <?php print_families($pdo) ?>
        </div>
    </section>
</main>

<?php require_once "./includes/footer.php"; ?>