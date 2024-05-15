<?php
require_once 'bookyears_model.php';

// get bookyear options for <select>
function fill_year_options()
{
    $results = $_SESSION["bookyears_years"];
    foreach ($results as $result) {
        echo "
        <option value='$result[jaar]'>$result[jaar]</option>
        ";
    }
}

// paste all bookings from data base or message if no results
function show_contributions()
{
    $results = $_SESSION["bookyears_data"];

    if ($results) {
        foreach ($results as $result) {
            echo "
                <div class='bookyears_contribution'>
                    <p><span>Naam: &ensp;</span>" . htmlspecialchars(ucfirst($result["voornaam"])) .
                " " . htmlspecialchars(ucfirst($result["achternaam"])) . "</p>
                    <p><span>Leeftijd: &ensp;</span>  " . htmlspecialchars(ucfirst($result["leeftijd"])) . "</p>
                    <p><span>Lidmaatschap: &ensp;</span> " . htmlspecialchars(ucfirst($result["lidmaatschap"])) . "</p>
                    <p><span>Contributie: &ensp;</span> &euro; " . htmlspecialchars(ucfirst($result["bedrag"])) . "</p>
                    <p><span>Boekjaar: &ensp;</span>  " . htmlspecialchars(ucfirst($result["boekjaar"])) . "</p>
                </div>
            ";
        }
    } else {
        echo "<h2 class='heading-2 center'>Er zijn nog geen boekingen</h2>";
    }

}
