<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php
    include('functions/DatabaseFunc.php');

    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];

    logIn($username, $password);

    include('Navbar.php');



  ?>
</body>
</html>
