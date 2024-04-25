<?php
$title = 'Familie';
$path = '../../';
require_once '../../includes/header.php';
require_once '../../includes/session.php';
require_once 'family_view.php';

?>


<main>
    <?php show_family_members() ?>
</main>


<?php require_once '../../includes/footer.php'; ?>