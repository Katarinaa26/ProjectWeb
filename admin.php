<?php

    require_once "validation.php";
    require_once "classes/database.php";
    

    $validation = true;
    $database = new DataBase();
    $db = $database->connect();
    $imeproizvodaErr = $cenaprozivodaErr = $slikaproizvodaErr = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $imeproizvoda = $_POST["imeproizvoda"];
        $cenaprozivoda = $_POST["cena"];
        $select = $_POST['admin-cakes'];
        if(text_validation($imeproizvoda)){
            $imeproizvodaErr = text_validation($imeproizvoda);
            $validation = false; 
        }
        if(empty($cenaprozivoda)){
            $cenaprozivodaErr = "Polje ne sme da bude prazno! Unesite cenu za prozivod.";
            $validation = false;
        }
        if($validation){
            if(!empty($_FILES["slikaproizvoda"]["name"])){ //ako slika nije postavljena
          
                $image= $_FILES["slikaproizvoda"]["name"]; //ime slike sa ekstenzijom
                $tmp_name=$_FILES["slikaproizvoda"]["tmp_name"]; //folder gde se slika trenutno nalazi
                $img_folder = "G:\\xampp\\htdocs\\ProjectWeb\\images\\" . $image; //folder u koji hocu da ga prebacim
                $extension = pathinfo($image, PATHINFO_EXTENSION); //vraca ekstenziju od fajla
                $dozvoljeneEkstenzije = array('jpg','png','jpeg','gif');
                if(in_array($extension, $dozvoljeneEkstenzije)){
                    if(move_uploaded_file($tmp_name, $img_folder)){
                        //prvo odakle pomeram fajl, pa onda gde ga pomeram
                        $q = "INSERT INTO `cakeshop`(`naziv`, `cena`, `slika`, `tip`) VALUES('$imeproizvoda', '$cenaprozivoda','$image','$select');";
                        $result = $db->query($q);
                        if($result){
                            echo "<script>alert('Uspesno ste dodali proizvod!')</script>";
                        }else{
                            echo "<script>alert('Greska u dodavanju proizvoda!')</script>";
                        }
                    }else{
                        $slikaproizvodaErr = "Nije moguce premestiti sliku!";
                    }
                }else{
                    $slikaproizvodaErr = "Dozvoljene su samo ekstenzije jpg, png, jpeg i gif!";
                }
            } else{
                $slikaproizvodaErr = "Dodajte sliku proizvoda!";
            }
        }
    
    }

      
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&family=Montserrat:wght@300;400;500;600;700;800;900&family=Pacifico&display=swap" rel="stylesheet">
 
  
    <title>Adminova stranica</title>

</head>

<body>

<section>
    <div class="center-text">
        <h2>Adminova stranica</h2>
        <hr>
    </div>
</section>

    <form class="formaregistracija" action="" method="post" enctype="multipart/form-data">

        <p>

            <label for="">Ime proizvoda:</label>

            <input type="tekst" name="imeproizvoda">
            <span class="err" id="err_surname">* <?php echo $imeproizvodaErr; ?> </span>
        </p>

        <p>

            <label for="">Cena:</label>

            <input type="number" name="cena">
            <span class="err" id="err_surname">* <?php echo $cenaprozivodaErr; ?> </span>

        </p>

        <p>
            <select name="admin-cakes">

                <option value="Svadbene torte">Svadbene torte</option>

                <option value="Rodjendanske torte">Rodjendanske torte</option>

                <option value="Vocne torte">Vocne torte</option>

                <option value="Cokoladne torte">Cokoladne torte</option>

                <option value="Poklon torte">Poklon torte</option>

                <option value="Decije torte">Decije torte</option>

            </select>
        </p>
        <p>

            <input type="file" name="slikaproizvoda">
            <span class="err" id="err_surname">* <?php echo $slikaproizvodaErr; ?> </span>

        </p>

        <p>

            <input type="submit" value="Dodaj proizvod">

        </p>
       
        <h5>Vidi proizvode koje si dodao/la kao admin <a href="prozivodiAdmin.php">ovde</a></h5>
        <br><br><br><br><br>
        <a href="classes/logout.php"><b>ODJAVI SE</b></a>
    </form>

 

    <script src="script.js"></script>

</body>

</html>