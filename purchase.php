<?php

session_start();

require_once "connection.php";


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['purchase'])){
            $q = "INSERT INTO `order_manager`(`ime_prezime`, `telefon`, `adresa`) VALUES ('$_POST[full_name]','$_POST[phone_no]','$_POST[address]')";
            $res = $conn->query($q);
                if($res){
                        $id_porudzbine=mysqli_insert_id($conn);
                    $q1 = "INSERT INTO `torba`(`id_porudzbine`, `ime_proizvoda`, `cena`, `kolicina`) VALUES (?,?,?,?)";
                    $stmt = mysqli_prepare($conn,$q1);
                    if($stmt && !empty($_POST['full_name']) && !empty($_POST['phone_no']) && !empty($_POST['address'])){
                        mysqli_stmt_bind_param($stmt,"isii",$id_porudzbine,$ime_proizvoda, $cena, $kolicina);
                        foreach($_SESSION['cart'] as $key=>$values){
                            $ime_proizvoda = $values['Item_Name'];
                            $cena = $values['Price'];
                            $kolicina = $values['Quantity'];
                            mysqli_stmt_execute($stmt);
                    }
                    unset($_SESSION['cart']);
                        echo "<script>
                        alert('Porudzbina uspesno izvrsena!');
                        window.location.href='pocetna.php';
                    </script>";
                    }else{
                        echo "<script>
                        alert('Molimo Vas popunite prazna polja kako biste izvrsili porudzbinu!');
                        window.location.href='mycart.php';
                    </script>";
                    }
                }
                else{
                    echo "<script>
                    window.location.href='mycart.php';
                    </scrtipt>";
                }
        }
       
    }
    
?>