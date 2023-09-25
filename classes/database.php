<?php

class DataBase{
    public function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "belshop";
    
        $conn = new mysqli($servername, $username, $password, $db);
    
        if($conn->connect_error){
            echo "<srcipt>alert('Nije moguca konekcija sa bazom podataka')</script>";
        }else{
            return $conn;
        }
    }
}