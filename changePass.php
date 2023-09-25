<?php
session_start();
    require_once "connection.php";
    require_once "validation.php";
 

    if(empty($_SESSION['id'])) {
        header('Location: login.php');
    }
    $id = $_SESSION['id'];

    $validation = true;
    $oldPasswordErr = $newPasswordErr = $retypeNewPasswordErr = "";
 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $oldPassword = $_POST['old_password'];
        $newPassword = $_POST['new_password'];
        $retypeNewPassword = $_POST['retype_new_password'];

        
        // Validacija za password
        if(password_validation($newPassword)) {
            $newPasswordErr = password_validation($newPassword);
            $validation = false;
        }

        // Validacija za re.password
        if(password_validation($retypeNewPassword)) {
            $retypeNewPasswordErr = password_validation($retypeNewPassword);
            $validation = false;
            if($newPassword != $retypeNewPassword) {
                $retypeNewPasswordErr = "Sifra i ponovljena sifra moraju da se poklapaju!";
                $validation = false;
            }
        }

        // Proveravamo da li se stari password poklapa sa pass. koji je u bazi
        $q = "SELECT `pass` FROM `users` WHERE `id` = '$id';";
        $res = $conn->query($q);
        $row = $res->fetch_assoc();

        // Proverim da li mi se poklapaju iz baze pass i pass koji sam unela kao old
        $check = password_verify($oldPassword, $row['pass']);
        if(!$check) {
   
            $oldPasswordErr = "Stare sifre se ne poklapaju!";
            $validation = false;
        }

        // Ako nigde nije prijavljena greška prilikom validacije, vršimo izmenu password polja u DB
     
        if($validation) {
           $new = password_hash($newPassword, PASSWORD_BCRYPT);
            $q1 = "UPDATE `users`
                    SET `pass` = '$new'
                    WHERE `id` = '$id';";
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
    <form action="" class="formaregistracija" method="POST">
       
       
        <p>
           Stara sifra:
            <input type="password" name="old_password" value="">
            <span class="err" id="err_surname">* <?php echo $oldPasswordErr; ?> </span>
        </p>
        <p>
            Nova sifra:
            <input type="password" name="new_password" value="">
            <span class="err" id="err_surname">* <?php echo $newPasswordErr; ?> </span>
        </p>
        <p>
            Ponovi novu sifru:
            <input type="password" name="retype_new_password" value="">
            <span class="err" id="err_surname">* <?php echo $retypeNewPasswordErr; ?> </span>
        </p>
        <p>
            <input type="submit" value="Izmeni">
        </p>
    </form>
</html>