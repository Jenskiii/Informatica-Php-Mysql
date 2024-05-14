<?php
// returns to login screen if not logged in
function return_to_login(){
    if (empty($_SESSION["user_username"])){
        header("Location: ./registration/login/login.php");
        die();
    }
}

// calculate total contribution of all family members together
function calculate_total_contribution($arrays){
    $sum = 0;
    foreach($arrays as $array){
       $sum += $array["bedrag"];
    }

    return $sum;
}
