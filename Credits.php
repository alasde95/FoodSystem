<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php
    include('functions/DatabaseFunc.php');
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
