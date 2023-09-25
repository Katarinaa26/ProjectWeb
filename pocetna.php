<?php session_start();?>
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

   <section class="home">
    <div class="home-text">
        <h1> BelShop - prodavnica torti <br> za svaku priliku!</h1>
        <p>
            Obradujte sebe i svoje najdraze<br> najfinijim tortama! <br>
            Zasladite svaki znacajan<br> dogadjaj u svom zivotu <br>
            porucivanjem u BelShop-u. 
        </p>
        <a class="btn" href="porucivanje.php">Izaberi tortu</a>
    </div>

   </section>

   

   <section>
        <div class="center-text">
            <h2>Pogledajte nas veb asortiman!</h2>
        </div>

        <div class="new-content">
            <div class="row">
                <img src="images/svadba.png" alt="">
                
                
                <div class="nekitekst">
                    <a href="porucivanje.php?tip=Svadbenetorte">Svadbene torte</a>
                </div>
            </div>

            <div class="row">
                <img src="images/bday.png" alt="">
                
                <div class="nekitekst">
                    <a href="porucivanje.php?tip=Rodjendansketorte">Rodjendanske torte</a>
                </div>
            </div>

            <div class="row">
                <img src="images/vocnatorta.png" alt="">
                
                <div class="nekitekst">
                    <a href="porucivanje.php?tip=Vocnetorte">Vocne torte</a>
                </div>
            </div>

            
            <div class="row">
                <img src="images/slice5.jpg" alt="">
                
                <div class="nekitekst">
                    <a href="porucivanje.php?tip=Cokoladnetorte">Cokoladne torte</a>
                </div>
            </div>

            <div class="row">
                <img src="images/srcetorta.png" alt="">
            
                <div class="nekitekst">
                    <a href="porucivanje.php?tip=Poklontorte">Poklon torte</a>
                </div>
            </div>

            <div class="row">
                <img src="images/decijetorte.jpg" alt="">
                
                <div class="nekitekst">
                    <a href="porucivanje.php?tip=Decijetorte">Decije torte</a>
                </div>
            </div>
        </div>
   </section>
   <?php
        require_once "footer.php";
    ?>


   <script src="script.js"></script>
</body>
</html>