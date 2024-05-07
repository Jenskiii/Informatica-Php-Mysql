<?php
function create_familyMember($pdo, $familyId, $fName, $lName, $birthday, $membership)
{
    set_familyMember($pdo, $familyId, $fName, $lName, $birthday, $membership);
}