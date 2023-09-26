<?php

// ne koristimo required za inout polje jer to ne radi u svim browserima

    require_once "validation.php";

    require_once "classes/database.php";

    require_once "classes/signup.php";



    if(isset($_SESSION["id"])){

        header("location:pocetna.php");

    }



    $validation = true;

    $nameErr = $surnameErr = $passErr = $reErr = $usernameErr = $emailErr = "";



    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $name = $_POST['name'];

        $surname = $_POST['surname'];

        $gender = $_POST['gender'];

        $username = $_POST['username'];

        $password = $_POST['password'];

        $repassword = $_POST['re_password'];

        $email = $_POST["email"];



        if(text_validation(($name))){

            $nameErr = text_validation($name);

            $validation = false;

        }



        if(text_validation(($surname))){

            $surnameErr = text_validation($surname);

            $validation = false;

        }



        if(username_validation($username)){

            $usernameErr = username_validation(($username));

            $validation = false;

        }



        if(password_validation($password)){

            $passErr = password_validation($password);

            $validation = false;

        }



        if($password != $repassword){

            $reErr = "Sifre se ne poklapaju!";

            $validation = false;

        }



        if(emailvalidation($email)){

            $emailErr = emailvalidation($email);

            $validation = false;

        }



        if($validation){

            $register = new Register();

            $result = $register->registration($name, $surname, $gender, $username, $password, $email);



            if($result == 10){

                echo "<script>alert('Username ili email su vec upotrebljeni')</script>";

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
    <title>Cake Shop</title>

    <!--link za font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&family=Montserrat:wght@300;400;500;600;700;800;900&family=Pacifico&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="style1.css">
</head>
<body>

<?php
    require_once "header.php";
    
?>

    <div class="container">
        <form action="#" method="post">
            <h2>Registrujte se</h2>
                <div class="content">
                    <div class="input-box">
                        <label for="">Ime:</label>
                        <input type="text" name="name" placeholder="Unesite ime">
                    </div>
                    <div class="input-box">
                        <label for="">Prezime:</label>
                        <input type="text" name="surname" placeholder="Unesite prezime">
                    </div>
                    <div class="input-box">
                        <label for="">Korisničko ime:</label>
                        <input type="text" name="username" placeholder="Unesite korisničko ime">
                    </div>
                    <div class="input-box">
                        <label for="">Email:</label>
                        <input type="text" name="email" placeholder="Unesite email adresu">
                    </div>
                    <div class="input-box">
                        <label for="">Šifra:</label>
                        <input type="password" name="password" placeholder="Unesite šifru">
                        <span class ="err" id="err_password">*<?php echo $passErr?></span>
                    </div>
                    <div class="input-box">
                        <label for="">Potvrdite šifru:</label>
                        <input type="password" name="re_password" placeholder="Potvrdite šifru">
                    </div>
                    <span class="gender-title">Pol:</span>
                    <div class="gender-category">
                        <input type="radio" name="gender" id="male">
                        <label for="">Muški</label>
                        <input type="radio" name="gender" id="female">
                        <label for="">Ženski</label>
                    </div>
                </div>
                <div class="alert">
                    <p>Klikom na Registruj se dugme slazete se sa nasim uslovima i <a href="#">politikom privatnosti</a></p>
                </div>
                <div class="button-container">
                    <button type="submit">Registruj se</button>
                </div>
        </form>
    </div>
        
  
    <script src="script.js"></script>

</body>

</html>