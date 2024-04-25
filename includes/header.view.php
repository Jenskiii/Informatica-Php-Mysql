<?php 

function output_username(){
    if (isset($_SESSION["user_username"])) {
        echo "<p>" . $_SESSION["user_username"] . "</p>";
    }
}

?>