<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cake Shop</title>

    <!--link za font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&family=Montserrat:wght@300;400;500;600;700;800;900&family=Pacifico&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        
        if(isset($_SESSION["id"])){
            require_once "headerlogged.php";
        }else{
            require_once "header.php";
        }
        
    ?>

   <section class="onama">
    <div class="onama-text">
        
        <h1> O nama</h1>
        <p>
            BelShop prodavnica torti osnovana je 2022. godine. 
            Sve nase torte pravljene su s ljubavlju i po tradicionalnim receptima nasih predaka. 
            Socne kore premazane su kremastim filovima sa ukusom cokolade, jagode, narandze, plazme, vanile, karamele...
            <br><br>Glavni sastojak nasih torta i kristalnih glazura je belgijska cokolada po kojoj je <i><b>Bel</b>Shop</i> dobila ime.
        
            Nudimo vam veliki izbor torti vrhunskog kvaliteta.
            Narucite tortu i uverite se u nas kvalitet! <br> Nas cilj je da vi budete zadovoljni!
        </p>
        <p>
            
            Klikom na dugme ispod mozete videti nasu celokupnu ponudu!            
        </p> 
    </div>
        <a class="btn" href="porucivanje.php">Poruci</a>
   </section>
   <div class="center-text">
    <br><br>
    <h2 style="color: rgb(238, 174, 212);">Nas tim radi vredno i pazljivo na svakom detalju!</h2>
    </div>
   <section class="banner">
        <div class="banner-img">
            <img src="images/prepare1.jpg" alt="">
        </div>
        <div class="banner-img">
            <img src="images/prepare2.jpg" alt="">
        </div>
        <div class="banner-img">
            <img src="images/prepare3.jpg" alt="">
        </div>
        
   </section>

   <div class="center-text">
    <br><br>
    <h2 style="color: rgb(238, 174, 212);">Posetite nas i uzivajte!</h2>
    </div>
  <section class="banner">
    <div class="banner-img">
        <img src="images/onamaslika1.png" alt="">
    </div>
    <div class="banner-img">
        <img src="images/onamaslika2.png" alt="">
    </div>
    <div class="banner-img">
        <img src="images/onamaslika3.png" alt="">
    </div>
    <div class="banner-img">
        <img src="images/onamaslika4.png" alt="">
    </div>
    <div class="banner-img">
        <img src="images/onamaslika5.png" alt="">
    </div>
    <div class="banner-img">
        <img src="images/onamaslika6.png" alt="">
    </div>
   
   </section>
 
   <div class="center-text">
    <br><br>
    <h2 style="color: rgb(238, 174, 212);">Cekamo vas!</h2>
    </div>
      
    <?php
    require_once "footer.php";
    
    ?>



   <script src="script.js"></script>
</body>
</html>