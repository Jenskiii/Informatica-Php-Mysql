<?php
function show_family_members()
{
        $results = $_SESSION["family_members"];


        //        var_dump($_SESSION["family_members"]);

        foreach ($results as $result) {
                echo $result["voornaam"];
        }

}