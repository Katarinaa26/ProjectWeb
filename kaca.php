<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="kaca.css">
</head>
<body>
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
</body>
</html>