<?php

//  SHARED VALIDATION
// check if input is empty
function is_input_empty($surname, $residence, $address, $zipcode)
{
    if (empty($surname) || empty($residence) || empty($address) || empty($zipcode)) {
        return true;
    } else {
        return false;
    }
}

function is_surname_invalid($surname)
{
    $number = preg_match('@[0-9]@', $surname);
    if ($number) {
        return true;
    } else {
        return false;
    }
}

function is_residence_invalid($residence)
{
    $number = preg_match('@[0-9]@', $residence);
    if ($number) {
        return true;
    } else {
        return false;
    }
}

// validate address
function is_address_invalid($address)
{
    $regex = preg_match(
        '/^([1-9][e][\s])*([a-zA-Z]+(([\.][\s])|([\s]))?)+[1-9][0-9]*(([-][1-9][0-9]*)|([\s]?[a-zA-Z]+))?$/i',
        strtolower($address)
    );

    if (!$regex && !empty($address)) {
        return true;
    } else {
        return false;
    }
}

// validate zipcode
function is_zipcode_invalid($zipcode)
{
    $regex = preg_match('/^[0-9]{4}[A-Z]{2}$/', $zipcode);

    if (!$regex && !empty($zipcode)) {
        return true;
    } else {
        return false;
    }
}
