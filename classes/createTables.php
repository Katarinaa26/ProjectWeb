<?php
    require_once "database.php";
    $DataBase = new DataBase();
    $db = $DataBase->connect();
    /*
    $q = "CREATE TABLE IF NOT EXISTS users(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        email VARCHAR(50) UNIQUE NOT NULL,
        pass VARCHAR(255) NOT NULL
        )ENGINE=INNODB;";

    $q .= "CREATE TABLE IF NOT EXISTS profiles(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        namee VARCHAR(50) NOT NULL,
        surname VARCHAR(50) NOT NULL,
        gender CHAR NOT NULL,
        userId INT UNSIGNED UNIQUE,
        CONSTRAINT user_id FOREIGN KEY(userId) REFERENCES users(id)
        )ENGINE=INNODB;";

    $result = $db->multi_query($q);
    if(!$result){
        echo $db->connect_error;
    }
*/
/*
    $q1 = "CREATE TABLE IF NOT EXISTS admins(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        admin_name VARCHAR(50) UNIQUE NOT NULL,
        pass VARCHAR(255) NOT NULL
        )ENGINE=INNODB;";
  $result1 = $db->multi_query($q1);
  if(!$result1){
      echo $db->connect_error;
  }
  $passAdmin = password_hash("kaca2610",PASSWORD_DEFAULT);
  $q2 = "INSERT INTO admins(`admin_name`, `pass`) VALUES('Katarina','$passAdmin')";
  $result2 = $db->multi_query($q2);
  if(!$result2){
      echo $db->connect_error;
  }
 */
/*
  $q = "CREATE TABLE IF NOT EXISTS cakeshop(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        naziv VARCHAR(50) NOT NULL,
        cena INT NOT NULL,
        slika VARCHAR(200) NOT NULL,
        tip VARCHAR(50) NOT NULL
    )ENGINE=INNODB;";
    $result = $db->multi_query($q);
    if(!$result){
    echo $db->connect_error;
    }
*/
/*
$q = "CREATE TABLE IF NOT EXISTS torba(
    id_porudzbine INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ime_proizvoda VARCHAR(50) NOT NULL,
    cena INT NOT NULL,
    kolicina INT NOT NULL
)ENGINE=INNODB;";

$result = $db->query($q);
if(!$result){
echo $db->connect_error;
}

$q = "CREATE TABLE IF NOT EXISTS order_manager(
    idporudzbine INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ime_prezime VARCHAR(255) NOT NULL,
    telefon VARCHAR(50) NOT NULL,  
    adresa VARCHAR(50) NOT NULL
)ENGINE=INNODB;";

$result = $db->query($q);
if(!$result){
echo $db->connect_error;
}
*/
/*
    $q1 = "CREATE TABLE IF NOT EXISTS managers(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        manager_name VARCHAR(50) UNIQUE NOT NULL,
        pass VARCHAR(255) NOT NULL
        )ENGINE=INNODB;";
  $result1 = $db->multi_query($q1);
  if(!$result1){
      echo $db->connect_error;
  }
  $passManager = password_hash("123456",PASSWORD_DEFAULT);
  $q2 = "INSERT INTO managers(`manager_name`, `pass`) VALUES('Tamara','$passManager')";
  $result2 = $db->multi_query($q2);
  if(!$result2){
      echo $db->connect_error;
  }
  */

