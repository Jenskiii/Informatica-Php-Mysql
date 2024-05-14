<?php
require_once 'famMembers_model.php';
// shows all familymembers inside a table
function show_family_members($pdo, $familyId)
{
  $results = get_family_members($pdo, $familyId);
 
  if ($results) {
    // table header
    echo '<table class="table">
            <tr>
              <th>Voornaam</th>
              <th>Achternaam</th>
              <th>Geboortedatum</th>
              <th>Lidmaatschap</th>
              <th>Acties</th>
            </tr>';
    // table body
    foreach ($results as $result) {
      $bookings = get_booking($pdo, $result["id"]);
      $bookings["boekjaar"] ??= "not yet set";
      echo '
          <tr>
            <td> ' . ucfirst(htmlspecialchars($result["voornaam"])) . '</td>
            <td> ' . ucfirst(htmlspecialchars($result["achternaam"])) . '</td>
            <td> ' . htmlspecialchars($result["geboortedatum"]) . '</td>
            <td> ' . ucfirst(htmlspecialchars($result["lidmaatschap"])) . '</td>
            <td class="table_buttons"> 
              <form class="card_update" action="./update/famMembers_update_contr.php" method="post">
                <input type="hidden" name="update_familyMember_id" id="update_familyMember_id"
                value="' . htmlspecialchars($result["id"]) . '">
                <button class="btn blue">Aanpassen</button>
              </form>

              <form class="card_delete" action="./delete/famMembers_delete.php" method="post">
                  <input type="hidden" name="delete_familyMember_id" id="delete_familyMember_id"
                  value="' . htmlspecialchars($result["id"]) . '">
                  <input type="hidden" name="delete_family_id" id="delete_family_id"
                  value="' . htmlspecialchars($familyId) . '"> 
                  <button class="btn">Verwijderen</button>
              </form>';

              // if member already booked for this year hide book button
      if ($bookings["boekjaar"]  !== date("Y")) {
        echo '      <form class="card_update" action="./booking/famMembers_booking.php" method="post">
                <input type="hidden" name="booking_familyMember_id" id="booking_familyMember_id"
                value="' . htmlspecialchars($result["id"]) . '">
                <input type="hidden" name="booking_family_id" id="booking_family_id"
                value="' . htmlspecialchars($familyId) . '">
                <button class="btn green">Boeken</button>
              </form>';
      }

      echo ' </td>
              </tr>';
    }
    // end table
    echo ' </table>';
  } else {
    echo "<h2 class='heading-2 center'>Voeg familieleden toe</h2>";
  }
}
// show prompt on data change
function is_handled_successful($url)
{
  // member added
  if (isset($_GET["memberAdded"]) && $_GET["memberAdded"] === 'success') {
    echo '  <div class="prompt success">
              <p>Familielid succesvol toegevoegd!</p>
            </div>';
    header("Refresh: 2.5; URL=$url");
  }
  // member deleted
  else if (isset($_GET["memberDeleted"]) && $_GET["memberDeleted"] === 'success') {
    echo '  <div class="prompt deleted">
              <p>Familielid succesvol verwijdert!</p>
            </div>';
    header("Refresh: 2.5; URL=$url");
  }
  // member updated
  else if (isset($_GET["memberUpdated"]) && $_GET["memberUpdated"] === 'success') {
    echo '  <div class="prompt success">
              <p>Familielid succesvol aangepast!</p>
            </div>';
    header("Refresh: 2.5; URL=$url");
  }
  // member booked
  else if (isset($_GET["memberBooked"]) && $_GET["memberBooked"] === 'success') {
    echo '  <div class="prompt success">
              <p>Familielid succesvol geboekt!</p>
            </div>';
    header("Refresh: 2.5; URL=$url");
  }
  // booking duplicate
  else if (isset($_GET["bookingError"]) && $_GET["bookingError"] === 'fail') {
    echo '  <div class="prompt deleted">
               <p>  Lid is al geboekt dit jaar!</p>
            </div>';
    header("Refresh: 2.5; URL=$url");
  }
}