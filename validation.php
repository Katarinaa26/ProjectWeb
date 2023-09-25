<?php

    function text_validation($tekst){

        if(empty($tekst)){

            return "Please enter a value";

        }elseif(strlen($tekst)>=50){

            return "the fild must be less then 50 characters! (you have: " . strlen($tekst). " characters)";

        }elseif(!ctype_alpha(str_replace(" ", "", $tekst))){ 

            return "The fild can only contains letters and spaces!";

        }else{

            return false;

        }

    }


    function password_validation($pass){

        if(empty($pass)){

            return "Please enter a value";

        }elseif(strlen($pass) < 5 || strlen($pass) > 25){

            return "Password must be between 5 and 25 characters!";

        }elseif(strlen(trim($pass)) != strlen($pass)){ //

            return "Password cannot contain spaces and tabs before and after!";

        }else{

            return false;

        }

    }



    function username_validation($username){

        if(empty($username)){

            return "Please enter a value!";

        }elseif(preg_match("/\s+/", $username)){

            return "Username cannot contain whitespaces and tabs!";

        }elseif(strlen($username) < 5 || strlen($username) > 50){

            return "Username should be between 5 and 50 characters!";

        }else{

            return false;

        }

    }



   function emailValidation($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "Invalid email format!";
        }else{
            return false;
        }
   }

?>