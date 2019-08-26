<?php

//Prüfen ob der User eingeloggt ist // Wenn nicht User versuchen einzuloggen
function isLoggedIn($username, $password, $logInStatus=''){
  if(!$logInStatus){
    $logInStatus = logIn($username, $password);
    return $logInStatus;
  }
}


function showOpenBookings($openBookings){
  ?>
  <table>
    <tr>
      <th>
        Mitarbeiter
      </th>
      <th>
        Artikel
      </th>
      <th>
        Credits
      </th>
    </tr>
  <?php
  foreach($openBookings as $booking){
    echo
      "<tr>
        <form action=\"Credits.php\" method=\"post\">
          <td>".$booking['username']."</td>
          <td>".$booking['article']."</td>
          <td>".$booking['credits']."</td>
          <td><input type=\"hidden\" name=\"checkedBooking\" value=\"".$booking['id']."\"></td>
          <td><input type=\"submit\" value=\"bestätigen\"></td>
        </form>
      </tr>";
  }
  ?>
  </table>
  <?php
}



 ?>
