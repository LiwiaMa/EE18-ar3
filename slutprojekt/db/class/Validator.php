<?php

/**
 * From Validator
 * PHP version 7
 * @category   PHP
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
 * @license    PHP CC
 */


class Validator
{
    
    private $errors = [];
    // Funktion till validator av förnamn (om man skrev in rätt)
    public function validateName($data)
    {
        //var_dump($data);
        if (!preg_match("/[a-zA-Z]/", $data)) {
             $this->errors[] = "<p>&#10005; First name doesn't include a-z</p>"; 
        }
        if (!preg_match("/[A-ZÅÄÖ]/", $data)) {
            $this->errors[] = "<p>&#10005; First name doesn't include A-Z</p>"; 
       }
    }
    // validator för efternamn
    public function validateLastname($data)
    {
        //var_dump($data);
        if (!preg_match("/[a-zA-Z]/", $data)) {
             $this->errors[] = "<p>&#10005; Last name doesn't include a-z</p>"; 
        }
        if (!preg_match("/[A-ZÅÄÖ]/", $data)) {
            $this->errors[] = "<p>&#10005; Last name doesn't include A-Z</p>"; 
       }
    }
    // Methods
    public function set($postdata)
    {
        $this->data = $postdata;
    }

    // Validator för lösenordet

    public function validatePass($data)
    {
        if (!preg_match("/[a-zåäö][A-ZÅÄÖ]/", $data) > 0) {
             $this->errors[] = '&#10005;password must contain a least one lowercase and Uppercase character<br>'; 
        }
       /*  if (!preg_match("/[A-ZÅÄÖ]/", $data) > 0) {
             $this->errors[] = '&#10005; password must contain a least one uppercase character<br>'; } */

            if (!preg_match("/[0-9]/", $data) > 0) {
             $this->errors[] = '&#10005; password must contain a least one number<br>'; 
        }
        if (!preg_match("/[#%&¤_\*\-\+\@\!\?\(\)\[\]\$£€]/", $data) > 0) {
           $this->errors[] = '&#10005; password must contain a least one special character<br>'; 
        }
        if (!preg_match("/^.{8,40}$/", $data) > 0) {
            $this->errors[] = '&#10005; password must at least 8 character long<br>'; 
        }
    }
    public function validateMail($data)
    {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
           $this->errors[] = "<p>&#10005;Invalid email format</p>"; 
        }
    }

    public function showErrors()
    {
        return $this->errors;
    }
}
