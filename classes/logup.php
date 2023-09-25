<?php

session_start();

class Login extends DataBase{

    public $db;

    public $id;

    public function loguj($username_email, $password){

        $db = $this->connect();

        $duplicate = mysqli_query($db, "SELECT * from users WHERE username = '$username_email' OR email = '$username_email';");

        $result = $duplicate->fetch_assoc();

        if($duplicate->num_rows > 0){

            $pass = $result["pass"];

            $checkPass = password_verify($password, $pass);

            if($checkPass){

                $this->id = $result["id"];

                return 1;

                //uspesno prijavljivanje

            }else{

                return 10;

                //netacna sifra

            }

        }else{

            $adminduplicate = mysqli_query($db, "SELECT * from admins WHERE admin_name = '$username_email';");
            //user nije registrovan
            $resultadmin = $adminduplicate->fetch_assoc();

            if($adminduplicate->num_rows > 0){
    
                $passadmin = $resultadmin["pass"];
    
                $checkPassAdmin = password_verify($password, $passadmin);
    
                if($checkPassAdmin){
    
                    $this->id = $resultadmin["id"];
    
                    return 2;
    
                    //uspesno prijavljivanje
    
                }else{
    
                    return 20;
    
                    //netacna sifra
    
                }
    
            }else{

                $managerduplicate = mysqli_query($db, "SELECT * from managers WHERE manager_name = '$username_email';");
            //user nije registrovan
            $resultmanager = $managerduplicate->fetch_assoc();

            if($managerduplicate->num_rows > 0){
    
                $passmanager = $resultmanager["pass"];
    
                $checkPassManager = password_verify($password, $passmanager);
    
                if($checkPassManager){
    
                    $this->id = $resultmanager["id"];
    
                    return 3;
    
                    //uspesno prijavljivan menadzer
    
                }else{
    
                    return 30;
    
                    //netacna sifra za menadzera
    
                }
              //  return 100;
                //nije registrovan ni admin ni korisnik
            }
            //nije registrovan ni menadzer 
            return 300;
            }

        }

    }

    public function getId(){

        return $this->id;

    }

}