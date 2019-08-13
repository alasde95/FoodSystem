<html>
<body>
  <?php
    include('controller/DatabaseC.php');
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Create connection
    $conn = new mysqli(DBSERVER, DBUSER, DBPASSWORD, DATABASE);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT username WHERE username = '$username' AND password = $password";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
      $result = $result[0]->fetch_assoc();
    } else {
      echo "keine Ergebnisse<br>";
    }


    $conn->close();

    var_dump($result);
  ?>
</body>
</html>
