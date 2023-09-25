<?php

require_once "classes/database.php";

$database = new DataBase();

$db = $database->connect();

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
    
    <section>
        <div class="center-text">
            
            <h2>Proizvodi:</h2>
        </div>

        <div class="new-content">
            
            <?php
                $q = "SELECT * FROM `cakeshop`";
                $result = $db->query($q);
            if($result){
                foreach($result as $row){
                echo "<div class='row'>";
                    echo "<img src='images/" . $row['slika'] . "'alt=''>". "</img>"; 
                    echo "<h4>".$row['naziv'] . "</h4>";
                    echo "<h5>".$row['cena'] . "din" ."</h5>";
                    echo " <a href='izmeniProizvod.php?idProizvoda=$row[id]'>Izmeni proizvod</a>";
                echo "</div>";
                }

            }
            ?> 
        </div>
   </section>


      
</body>
</html>