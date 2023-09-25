<?php


require_once "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $naziv = $_POST['naziv'];
    $cena = $_POST['cena'];
    $idProizvoda = $_GET['idProizvoda'];

    $q = "UPDATE `cakeshop` SET `naziv`='$naziv',`cena`='$cena' WHERE `id` = $idProizvoda;";
    $res = $conn->query($q);
    if($res){
        echo "<script>
        alert('Uspesno ste izmenili proizvod!');
        window.location.href='prozivodiAdmin.php';
    </script>";
    }else{
        echo "Doslo je do greske prilikom izmene proizvoda!";
    }

}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmena proizvoda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="#" class="formaregistracija" method="POST">
        <p>
            Novi naziv proizvoda:
            <input type="text" name="naziv" value="<?php if(isset($naziv)) echo $naziv; ?>">
        </p>
        <p>
            Nova cena proizvoda:
            <input type="text" name="cena" value="<?php if(isset($cena)) echo $cena; ?>">
        </p>
        <p>
            <input type="submit" value="Izvrsi izmene">
        </p>
    </form>
</body>
</html>