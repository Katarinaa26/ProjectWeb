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


    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    require_once "header.php";
    
?>


   <section>
    <div class="center-text">
        <br><br><br><br><br>
        <h2>Registrujte se</h2>
        <br><br><br>
        <hr>
    </div>


    <form class="formaregistracija" action="" method="post">

        <p>

            <label for="">Ime:</label>

            <input type="text" name="name" value="<?php if(isset($name))echo $name?>">

            <span class ="err" id="err_name">* <?php echo $nameErr?> </span>

        </p>

        <p>

            <label for="">Prezime:</label>

            <input type="text" name="surname" id="" value="<?php if(isset($surname))echo $surname?>">

            <span class ="err" id="err_surname">*<?php echo $surnameErr?></span>



        </p>

        <p>

            <label for="">Pol:</label>

           

            <input type="radio" name="gender" id=""  value="m"  <?php if(isset($gender) && $gender == "m") {echo "checked";} ?> >Male

            <input type="radio" name="gender" id="" value="f" <?php if(isset($gender) && $gender == "f") {echo "checked";} ?> >Female

            <input type="radio" name="gender" id="" value="o" <?php if(!isset($gender) || $gender == "o") {echo "checked";} ?>>Other

           

        </p>

        <p>

            <label for="">Korisničko ime:</label>

            <input type="text" name="username" id="" value="<?php if(isset($username))echo $username?>">

            <span class ="err" id="err_username">*<?php echo $usernameErr?></span>

        </p>

        <p>

            <label for="">Šifra:</label>

            <input type="password" name="password" id="" value="">

            <span class ="err" id="err_password">*<?php echo $passErr?></span>

        </p>

        <p>

            <label for="">Ponovi šifru:</label>

            <input type="password" name="re_password" id="" value="">

            <span class ="err" id="err_repassword">*<?php echo $reErr?></span>

        </p>

        <p>

            <label for="">Email:</label>

            <input type="email" name="email" id="" value="">

            <span class ="err" id="err_email">*<?php echo $emailErr?></span>

        </p>

        <p>

            <input type="submit" value="Registruj se">

        </p>

        
    
    </form>
  
    <script src="script.js"></script>

</body>

</html>