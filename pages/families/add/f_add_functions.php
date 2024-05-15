<?php
//  DATABASE FUNCTIONS


function create_family($pdo, $surname, $residence, $address, $zipcode)
{
    set_family($pdo, $surname, $residence, $address, $zipcode);
}


// //  VALIDATION
// check if address is taken
function is_address_taken($pdo, $address)
{
    if (get_address($pdo, $address)) {
        return true;
    } else {
        return false;
    }
}
