<?php
  include('./config/Database.php');

  function openDB(){
    // Create connection
    $conn = new mysqli(DBSERVER, DBUSER, DBPASSWORD, DATABASE);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  }

  //Prüft die Zugangsdaten
  function logIn($username, $password){

    // Create connection
    $conn = new mysqli(DBSERVER, DBUSER, DBPASSWORD, DATABASE);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
    // Create connection
    $conn = new mysqli(DBSERVER, DBUSER, DBPASSWORD, DATABASE);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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

  function createUser($username, $password, $admin){
    // Create connection
    $conn = new mysqli(DBSERVER, DBUSER, DBPASSWORD, DATABASE);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO user(username, password, admin) VALUES ('$username', '$password', '$admin')";
    $result = $conn->query($sql);

    $sql = "INSERT INTO credits VALUES ('$username', 0)";
    $result = $conn->query($sql);
  }

  function getArticles(){
    // Create connection
    $conn = new mysqli(DBSERVER, DBUSER, DBPASSWORD, DATABASE);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
    // Create connection
    $conn = new mysqli(DBSERVER, DBUSER, DBPASSWORD, DATABASE);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO history (username, article, credits) VALUES ('$username', '$booking[0]', $booking[1])";
    $result = $conn->query($sql);

  }

  function showOpenBookings(){
    // Create connection
    $conn = new mysqli(DBSERVER, DBUSER, DBPASSWORD, DATABASE);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM history WHERE checked = 0";
    $result = $conn->query($sql);
    $i = 0;
    while($row = $result->fetch_assoc()) {
        $openBookings[$i] = $row;
        $i++;
    }
    return $openBookings;
  }
?>
