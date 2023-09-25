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


   <section>
    <div class="center-text">
        <br><br><br><br><br>
        <h2>Kontaktirajte nas</h2>
        <br><br><br>
        <hr>
    </div>

    <div class="new-content">
        <div class="rowkontakt">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11672.935654844663!2d21.939337790067857!3d42.994408862664564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475582ad670c5a1f%3A0xcb4b0801354693!2sKoste%20Stamenkovic%CC%81a%2C%20Leskovac!5e0!3m2!1sen!2srs!4v1672999212150!5m2!1sen!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="rowkontakt">
            <p>
                <b>Ulica i broj: </b> Koste Stamenkovica 5
            </p>
            <p>
                <b>Grad: </b> Leskovac
            </p>
            <p>
                <b>Postanski broj: </b> 16 000
            </p>
            <p>
                <b>Mobilni telefon: </b> 062/123 - 123
            </p>
            <p>
                <b>Fiksni telefon: </b> 016/222 - 333
            </p>
        </div>
    </div>
   </section>
   
 
 
      
   <?php
    require_once "footer.php";
    
    ?>
   



   <script src="script.js"></script>
</body>
</html>