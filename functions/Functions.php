<?php

//Prüfen ob der User eingeloggt ist // Wenn nicht User versuchen einzuloggen
function isLoggedIn($username, $password, $logInStatus=''){
  if(!$logInStatus){
    $logInStatus = logIn($username, $password);
    return $logInStatus;
  }
}

 ?>
