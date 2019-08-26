<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php
    include('functions/DatabaseFunc.php');
    include('functions/Functions.php');
    include('Navbar.php');
  ?>

    <?php
      //offene Credit Buchungen abholen
      $openBookings = getOpenBookings();
      //Wenn eine offene Buchung bestätigt wurde, wird diese in der DB bestätigt
      if(isset($_POST['checkedBooking'])){
        $bookingId = (int)$_POST['checkedBooking'];
        checkBooking($bookingId);
      }
      //Zeige Offene Buchungen an weil welche Vorhanden sind
      if(is_array($openBookings)){
        //offene Buchungen anzeigen
        showOpenBookings($openBookings);
      }
    ?>

  <br>

  <form action="Credits.php" method="post">
    <select name="booking">
    <?php
      $articles = getArticles();
      foreach($articles as $article){
        echo $article['article']." ".$article['credits']."<br>";
        echo "<option name=value=\"".$article['article']."\">".$article['article']." ".$article['credits']."</option>";
      }
    ?>
    </select>
    <input type="submit" value="Credits buchen">
  </form>

  <?php
    if(isset($_POST['booking'])){
      $bookingArticle = $_POST['booking'];
      session_start();
      $username = $_SESSION['username'];
      bookCredits($bookingArticle, $username);
    }

  ?>
</body>
</html>
