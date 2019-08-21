<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php
    include ("Navbar.php");
  ?>
  <form action="User.php" method="post">
    <input type="text" name="username"> <br>
    <input type="password" name="password"><br>
    <input type="checkbox" name="admin">admin<br>
    <input type="submit" value="absenden">
  </form>

  <?php
    include ("functions/DatabaseFunc.php");

    if(count($_POST) > 0 ){
      $username=$_POST['username'];
      $password=$_POST['password'];
      $admin=0;

      if(isset($_POST['admin'])){
        $admin = 1;
      }

      createUser($username, $password, $admin);
    }

   ?>

</body>
</html>
