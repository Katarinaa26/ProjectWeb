<?php
    require_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Managers page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table>
                    <tr>
                        <th>Broj porudzbine</th>
                        <th>Kupac</th>
                        <th>Telefon kupca</th>
                        <th>Adresa kupca</th>
                        <th>Porudzbine</th>
                    </tr>
                    <?php
                        $q = "SELECT * FROM `order_manager`";
                        $res = $conn->query($q);
                        foreach($res as $row){
                            echo "<tr>
                                <td>$row[idporudzbine]</td>
                                <td>$row[ime_prezime]</td>
                                <td>$row[telefon]</td>
                                <td>$row[adresa]</td>
                                <td>
                                    <table>
                                        <tr>
                                            <th>Naziv proizvoda</th>
                                            <th>Cena</th>
                                            <th>Kolicina</th>
                                        </tr>
                                   
                                ";
                            $q1 = "SELECT * FROM `torba` WHERE `id_porudzbine`='$row[idporudzbine]'";
                            $res1 = $conn->query($q1);
                            foreach($res1 as $row1){
                                echo"
                                    <tr>
                                        <td>$row1[ime_proizvoda]</td>
                                        <td>$row1[cena]</td>
                                        <td>$row1[kolicina]</td>
                                    </tr>
                                ";
                            }
                            echo"
                                </table>
                                </td>
                            </tr>";
                        }
                    ?>
                    
                </table>
            </div>
        </div>
    </div>
</body>
</html>