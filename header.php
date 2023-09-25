<?php
session_start();
?>
<header>
   <a href="#" class="logo">BelShop</a>
   <ul class="navbar">
      <li><a href="pocetna.php">Početna</a></li>
      <li><a href="onama.php">O nama</a></li>
      <li><a href="porucivanje.php">Poručivanje</a></li>
      <li><a href="kontakt.php">Kontakt</a></li>
      <li><a href="registracija.php">Registruj se</a></li>
   </ul>

   <div class="h-icons">
      <?php
      $count = 0;
         if(isset($_SESSION['cart'])){
            $count = count($_SESSION['cart']);
         }
      ?>
      <a href="mycart.php">Moja Korpa (<?php echo $count ?>)</a>
      <a href="login.php"><img src="images/user.png" alt=""></a> 
      <a class="icon" id="menu-icon" href="#"><img src="images/menu.png" alt=""></a>
      
   </div>
 </header>