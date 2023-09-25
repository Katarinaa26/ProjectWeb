<?php
    require_once "classes/database.php";
    $database = new DataBase();
    $db = $database->connect();
    $id = $_SESSION["id"];
    $q = "SELECT * FROM profiles WHERE userId = $id;";

    $result = $db->query($q);
    if($result){
        $row = $result->fetch_assoc();
        $pol = $row["gender"];
    }
 
?>
<header>
   <a href="#" class="logo">BelShop</a>
   <ul class="navbar">
      <li><a href="pocetna.php">Početna</a></li>
      <li><a href="onama.php">O nama</a></li>
      <li><a href="porucivanje.php">Poručivanje</a></li>
      <li><a href="kontakt.php">Kontakt</a></li>
      <li><a href="classes/logout.php"><b>Odjavi se</b></a></li>
      
   </ul>
   
   
   <div class="h-icons">
      <?php
      $count = 0;
         if(isset($_SESSION['cart'])){
            $count = count($_SESSION['cart']);
         }
      ?>
      <a href="mycart.php"> Poruceno <?php echo $count ?> torti</a>
      
      
   </div>

   <div class="h-icons">
      <a href="mycart.php"><img src="images/bag.png" alt=""></a>
      <a href="#">
        <?php if($pol == "z" || $pol == "f"):?>

        <img class="zena_avatar" src="images/zena_avatar.jpg">
        <h3><a id="zavatartext" href="changeProfile.php">Uredi profil</a></h3>
        

        <?php elseif($pol == "m"):?>

        <img class="man_avatar" src="images/man_avatar.png">
        <h3><a id="mavatartext" href="changeProfile.php">Uredi profil</a></h3>
        

        <?php else: ?>

        <img class="univerzalni_avatar" src="images/univerzalni_avatar.png">
        <p><h3><a id="uavatartext" href="changeProfile.php">Uredi profil</a></h3></p>

        <?php endif ?>
      </a> <!--ikonica za logovanje i kad se korisnik uloguje tad ce ta str isto da izgleda samo umesto te ikonice ce da ima avatara -->
      <a class="icon" id="menu-icon" href="#"><img src="images/menu.png" alt=""></a>
     
   </div>
 </header>