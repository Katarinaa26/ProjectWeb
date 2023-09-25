<?php
session_start();
    if(isset($_SESSION["id"])){
        require_once "headerlogged.php";
    }else{
        require_once "header.php";
    }
 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korpa</title>

    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="table">
            <div>
            <br><br><br><br><br><br><br><br><br><br>    
            <h1 id="h1-table">Moja korpa</h1>
            </div>

            <div>
            <table border="1" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Broj proizvoda</th>
                        <th>Ime proizvoda</th>
                        <th>Cena proizvoda</th>
                        <th>Kolicina</th>
                        <th>Ukupno</th>
                        <th>Ukloni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       
                        if(isset($_SESSION['cart'])){
                            foreach($_SESSION['cart'] as $key => $value){
                               $sr = $key+1;
                              
                                echo "
                                    <tr>
                                        <td>$sr</td>
                                        <td>$value[Item_Name]</td>
                                        <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                                        <td>
                                            <form action='manage_cart.php' method='post'>
                                                <input class='iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
                                                <input type='hidden' name='Item_Name' value='$value[Item_Name]'></input>
                                            </form>
                                        </td>

                                        <td class='itotal'></td>
                                        <td>
                                            <form action='manage_cart.php' method='post'>
                                                <button name='Remove_Item'>UKLONI</button>
                                                <input type='hidden' name='Item_Name' value='$value[Item_Name]'></input>
                                            </form>
                                        </td>
                                    </tr>
                                ";
                            }
                        } 
                        ?>
                       
                    </tbody>
                </table>
            </div>

                <div class="col-lg-4">
                    <div class="div">
                        <h2 id="h2-table">Ukupan iznos:</h2>
                        <h3 id="gtotal"></h3>
                        <br><br>
                        <h4>Unesite svoje podatke kako biste izvrsili porudzbinu:</h4>
                        <br>
                        <br>
                        <?php if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){?>
                        <form action="purchase.php" method="POST">
                            <label for="">Ime i prezime:</label>
                            <input type="text" name="full_name" id="">

                            <label for="">Telefon:</label>
                            <input type="text" name="phone_no" id="">

                            <label for="">Adresa:</label>
                            <input type="text" name="address" id="">
                            <input type="submit" name="purchase" value="Napravi porudzbinu">
                        </form>
                        <?php }?>
                    </div>
                </div>
        </div>
    </div>
    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');  
        var gtotal = document.getElementById('gtotal');

          function subTotal(){
            gt=0;
            for(i=0;i<iprice.length;i++){
                itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
                gt = gt + (iprice[i].value)*(iquantity[i].value);
            }
            gtotal.innerText=gt;
          }      
          subTotal();
    </script>
</body>
</html>