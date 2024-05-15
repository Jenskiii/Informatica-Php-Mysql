<?php
function create_contribution($pdo, $memberId, $familyId, $fName, $lname, $age, $membership, $price, $bookyear)
{
   set_contribution($pdo, $memberId, $familyId, $fName, $lname, $age, $membership, $price, $bookyear);
}

// convert birthday to age
function calculate_age($birthday)
{
   //explode the date to get month, day and year
   $dateOfBirth = $birthday;
   $today = date("Y-m-d");
   $diff = date_diff(date_create($dateOfBirth), date_create($today));

   return $diff->format('%y');
}


// calculate the discount
function calculate_age_discount($age)
{
   $discount = 0;
   if ($age < 8) {
      $discount = 50;
   } else if ($age >= 8 && $age <= 12) {
      $discount = 40;
   } else if ($age >= 13 && $age <= 17) {
      $discount = 25;
   } else if ($age >= 18 && $age <= 50) {
      $discount = 0;
   } else if ($age >= 51) {
      $discount = 45;
   }

   return $discount;
}

// calulate the total price
function calculate_price($membership, $discount)
{
   $basePrice = 100;

   $memberPrice = $basePrice - ($basePrice * ($membership / 100));

   $totalPrice = $memberPrice - ($memberPrice * ($discount / 100));

   return $totalPrice;
}


// is item in array

function searchForId($year, $array)
{
   foreach ($array as $key => $val) {
      if ($val['jaar'] === $year) {
         return $key;
      }
   }
   return null;
}