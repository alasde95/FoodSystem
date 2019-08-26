<?php
  include('./config/Database.php');

  function openDB(){
    // Create connection
    $conn = new mysqli(DBSERVER, DBUSER, DBPASSWORD, DATABASE);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
  }

  //Prüft die Zugangsdaten
  function logIn($username, $password){

    $conn = openDB();

    $sql = "SELECT username FROM user WHERE username = '$username' AND password = '$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
      $result = $result->fetch_assoc();
      $login = true;
      return $login;
    } else {
      $login = false;
      echo "Falsche Zugangsdaten";
      exit;
    }

    $conn->close();
  }

  //Gibt User und ihre Credits in einer Tabelle aus
  function listUsers(){
    $conn = openDB();
    $sql = "SELECT username, credits FROM credits ORDER BY credits DESC";
    $result = $conn->query($sql);
    $i = 0;

    while ($row = $result->fetch_assoc()) {
        $user[$i] = $row;
        $i++;
    }

    foreach($user as $user){
      echo "<tr><td>".$user['username']."</td><td>".$user['credits']."</td></tr>";
    }
    $conn->close();
    //var_dump($elements);
  }

  //erstellt einen User
  function createUser($username, $password){
    $conn = openDB();
    $sql = "INSERT INTO user(username, password) VALUES ('$username', '$password')";
    $result = $conn->query($sql);

    $sql = "INSERT INTO credits VALUES ('$username', 0)";
    $result = $conn->query($sql);
  }


  function getArticles(){
    $conn = openDB();
    $sql = "SELECT * FROM articles";
    $result = $conn->query($sql);
    $i = 0;
    while($row = $result->fetch_assoc()) {
        $articles[$i] = $row;
        $i++;
    }
    return $articles;

  }

  function bookCredits($booking, $username){
    $booking = explode(" ", $booking);
    $conn = openDB();
    $sql = "INSERT INTO history (username, article, credits) VALUES ('$username', '$booking[0]', $booking[1])";
    $result = $conn->query($sql);

  }

  function getOpenBookings(){
    $conn = openDB();
    $sql = "SELECT * FROM history WHERE checked = 0";
    $result = $conn->query($sql);
    $i = 0;
    while($row = $result->fetch_assoc()) {
        $openBookings[$i] = $row;
        $i++;
    }
    if(isset($openBookings)){
      return $openBookings;
    }
  }

  function checkBooking($booking){
    $conn = openDB();
    $id = $booking;
    $sql = "UPDATE history SET checked = 1 WHERE id = $id";
    $result = $conn->query($sql);
  }
?>
