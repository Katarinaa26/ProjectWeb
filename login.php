<?php
session_start();
// ne koristimo required za inout polje jer to ne radi u svim browserima

    require_once "classes/database.php";

    require_once "classes/logup.php";    



    if(isset($_SESSION["id"])){

        header("location:pocetna.php");

    }



    $login = new Login();

 

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST["username_email"];

        $password = $_POST["password"];

        $result = $login->loguj($username, $password);



        if($result == 1){

            $_SESSION["login"] = true;

            $_SESSION["id"] = $login->getId();

            header("location:pocetna.php");

        }elseif($result == 100){
            echo "<script>alert('Nije registrovan ni admin ni korisnik sa tim imenom. Molimo Vas registrujte se!')</script>";

        }elseif($result == 10){

            echo "<script>alert('Korisnikova sifra nije tacna')</script>";

        } elseif($result==2){
            $_SESSION["admin"] = true;
            $_SESSION["admin_id"] = $login->getId();
            header("location:admin.php");
        } elseif($result==20){
            echo "<script>alert('Admin sifra nije tacna')</script>";
        } else if($result==3){
            $_SESSION["manager"] = true;
            $_SESSION["manager_id"] = $login->getId();
            header("location:izbrisiKorisnika.php");
        }elseif($result==30){
            echo "<script>alert('Menadzer sifra nije tacna')</script>";
        }elseif($result==300){
            echo "<script>alert('Nije prijavljen menadzer!')</script>";
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
 

    <title>Prijavi se</title>

</head>

<body>
<?php
    require_once "header.php";
?>
<section>
    <div class="center-text">
        <br><br><br><br><br>
        <h2>Prijavite se</h2>
        <br><br><br>
        <hr>
    </div>
</section>

    <form class="formaregistracija" action="" method="post">

        <p>

            <label for="">Korisničko ime ili email:</label>

            <input type="tekst" name="username_email">

        </p>

        <p>

            <label for="">Šifra:</label>

            <input type="password" name="password">

        </p>

        <p>

            <input type="submit" value="Prijavi se">

        </p>
       

    </form>

    <script src="script.js"></script>

</body>

</html>