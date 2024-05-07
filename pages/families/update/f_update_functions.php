<?php
// update family with new values
function update_family($pdo, $id, $surname, $residence, $address, $zipcode)
{
    set_family($pdo, $id, $surname, $residence, $address, $zipcode);
}


// //  VALIDATION
// check if address is taken and fixes error if new address matches old address
function is_address_taken($pdo, $id, $newAddress)
{
    $oldAdress = get_address($pdo, $id)["adres"];

    if ($oldAdress === $newAddress) {
        return false;
    } else if ($oldAdress !== null && $oldAdress !== $newAddress) {
        return true;
    }else{
        return false;
    }

}


