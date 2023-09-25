<?php
session_start();
    require_once "connection.php";
    require_once "validation.php";
 

    if(empty($_SESSION['id'])) {
        header('Location: login.php');
    }
    $id = $_SESSION['id'];

    $validation = true;
    $oldPasswordErr = $nameErr = $usernameErr = $surnameErr = "";
 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $username= $_POST['username'];
        $surname = $_POST['surname'];
        $gender = $_POST['gender'];
       

        if(text_validation($name)) {
            $nameErr = text_validation($name);
            $validation = false;
        }

        // Validacija za prezime
        if(text_validation($surname)) {
            $surnameErr = text_validation($surname);
            $validation = false;
        }
        if(text_validation($username)) {
            $usernameErr = text_validation($username);
            $validation = false;
        }
      



        // Ako nigde nije prijavljena greška prilikom validacije, vršimo izmenu password polja u DB
       
        if($validation) {
           
           $q = "UPDATE `users` SET
                 `username` = '$username'
                 WHERE `id` = '$id';";
            $conn->query($q);
            
            $q1 = "UPDATE `profiles`
                    SET `namee` = '$name', `surname` = '$surname', `gender` = '$gender'
                    WHERE `userId` = '$id';";
            $res1 = $conn->query($q1);

            
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promeni sifru</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="#" class="formaregistracija" method="POST">
        <p>
            Ime:
            <input type="text" name="name" value="<?php if(isset($name)) echo $name; ?>">
            <span class="err" id="err_name">* <?php echo $nameErr; ?></span>
        </p>
        <p>
            Korisničko ime:
            <input type="text" name="username" value="<?php if(isset($name)) echo $username; ?>">
            <span class="err" id="err_name">* <?php echo $usernameErr; ?></span>
        </p>
        <p>
            Prezime:
            <input type="text" name="surname" value="<?php if(isset($surname)) echo $surname; ?>">
            <span class="err" id="err_surname">* <?php echo $surnameErr; ?> </span>
        </p>
        <p>
            Pol:
            <input type="radio" name="gender" value="m" <?php if(isset($gender) && $gender == "m") echo "checked"; ?> >Male
            <input type="radio" name="gender" value="f" <?php if(isset($gender) && $gender == "f") echo "checked"; ?>>Female
            <input type="radio" name="gender" value="o" <?php if(isset($gender) && $gender != "m" && $gender != "f") echo "checked"; ?>>Other
        </p>
       <br><br>
       <input type="submit" value="Izvrsi promene">
       <br><br>
       <a href="changePass.php">Promeni šifru</a>
    </form>
</html>