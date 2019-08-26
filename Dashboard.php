<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php
    include('functions/DatabaseFunc.php');
    include('functions/Functions.php');

    if(isset($_POST['username']) && isset($_POST['password'])){
      session_start();
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = $_POST['password'];
      $_SESSION['logInStatus'] = isLoggedIn($_SESSION['username'], $_SESSION['password']);

    } else {
      session_start();
      isLoggedIn($_SESSION['username'], $_SESSION['password'], $_SESSION['logInStatus']);
    }


  include('Navbar.php');



  ?>

  <table>
    <tr>
      <th>Benutzer</th>
      <th>Credits</th>
    </tr>
    <?php
      listUsers();
    ?>
  </table>

</body>
</html>
