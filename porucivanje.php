<?php
session_start();
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
        
        <h2>Proizvodi koje mozete poruciti:</h2>
    </div>
    <form action="#" class="forma-filter" method="post">
        <p class="kategorije">
            <input type="radio" name="n" value="Sve torte" > <b>Sve torte</b>
        </p>
        <p class="kategorije">
            <input type="radio" name="n" value="Svadbene torte" <?php if(isset($_GET['tip']) && $_GET['tip'] == 'Svadbenetorte') echo 'checked';?>> Svadbene torte
        </p>
        <p class="kategorije">
            <input type="radio" name="n" value="Rodjendanske torte" <?php if(isset($_GET['tip']) && $_GET['tip'] == 'Rodjendansketorte') echo 'checked';?>> Rodjendanske torte
        </p>
        <p class="kategorije">
            <input type="radio" name="n" value="Vocne torte" <?php if(isset($_GET['tip']) && $_GET['tip'] == 'Vocnetorte') echo 'checked';?>> Vocne torte
        </p>
        <p  class="kategorije">
            <input type="radio" name="n" value="Cokoladne torte" <?php if(isset($_GET['tip']) && $_GET['tip'] == 'Cokoladnetorte') echo 'checked';?>> Cokoladne torte
        </p>
        <p  class="kategorije">
            <input type="radio" name="n" value="Poklon torte" <?php if(isset($_GET['tip']) && $_GET['tip'] == 'Poklontorte') echo 'checked';?>> Poklon torte
        </p>
       
        <p  class="kategorije">
            <input type="radio" name="n" value="Decije torte" <?php if(isset($_GET['tip']) && $_GET['tip'] == 'Decijetorte') echo 'checked';?>> Decije torte
        </p>
        <p>
            <input type="submit" value="Filter">
        </p>
        
    </form>

    
    <div class="new-content">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $kategorije = $_POST['n'];
                if($kategorije == "Sve torte"){
                    $q1 = "SELECT * FROM `cakeshop`";
                    $result1 = $db->query($q1);
                    if($result1){
                        foreach($result1 as $row1){
                            echo "<div class='row'>";
                                echo "<img src='images/" . $row1['slika'] . "'alt=''>". "</img>"; 
                                echo "<h4>".$row1['naziv'] . "</h4>";
                                echo "<h5>".$row1['cena'] . " din". "</h5>";

                                echo "<div class='bbtn'>";
                                echo  "<button type='submit' name='Add_To_Cart'>Dodaj u korpu</button>";
                                echo "<input type='hidden' name='Item_Name' value='$row1[naziv]'></input>";
                                echo "<input type='hidden' name='Price' value='$row1[cena]'></input>";
                                echo "</div>";
                            echo "</div>";
                        }
                    }
                } else{
                    $q = "SELECT * FROM `cakeshop` WHERE `tip` LIKE '%$kategorije%';";
                    $result = $db->query($q);
                    if($result){
                        foreach($result as $row){
                            echo "<div class='row'>";
                                echo "<img src='images/" . $row['slika'] . "'alt=''>". "</img>"; 
                                echo "<h4>".$row['naziv'] . "</h4>";
                                echo "<h5>".$row['cena'] . " din". "</h5>";
        
                                echo "<div class='bbtn'>";
                                echo  "<button type='submit' name='Add_To_Cart'>Dodaj u korpu</button>";
                                echo "<input type='hidden' name='Item_Name' value='$row[naziv]'></input>";
                                echo "<input type='hidden' name='Price' value='$row[cena]'></input>";
                                echo "</div>";
                            echo "</div>";
                        }
                    }
                }
                
            }else{
                $q2 = "SELECT * FROM `cakeshop`";
                $result2 = $db->query($q2);
                if($result2){
                    foreach($result2 as $row2){
                       echo "<form action='manage_cart.php' method='post'>";
                          echo "<div class='row'>";
                          echo "<img src='images/" . $row2['slika'] . "'alt=''>". "</img>"; 
                          echo "<h4>".$row2['naziv'] . "</h4>";
                          echo "<h5>".$row2['cena'] . " din". "</h5>";
      
                          echo "<div class='bbtn'>";
                              echo  "<button type='submit' name='Add_To_Cart'>Dodaj u korpu</button>";
                              echo "<input type='hidden' name='Item_Name' value='$row2[naziv]'></input>";
                              echo "<input type='hidden' name='Price' value='$row2[cena]'></input>";
                              echo "</div>";
                          echo "</div>";
                       echo "</form>";
                    }
                }
            }
        
          
        
        ?> 
    </div>
   </section>


    <?php
        require_once "footer.php";
    ?>


   <script src="script.js"></script>
</body>
</html>