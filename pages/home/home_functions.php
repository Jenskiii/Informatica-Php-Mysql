<?php
// returns to login screen if not logged in
function return_to_login(){
    if (empty($_SESSION["user_username"])){
        header("Location: ./registration/login/login.php");
        die();
    }
}