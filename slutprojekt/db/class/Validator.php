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
    private  $errors = [];
    private $data;
    function validateUsername()
    {
        if (!preg_match("/[a-zA- Z0-9] {6,12}", $this->data)) {
            $this->errors['fnman'][] = "&#10005; Innehåller inte a-z, A_Z, 0-9<";
        }
    }
    // Methods
    public function set($postdata)
    {
        $this->data = $postdata;
    }

    public function validatePassword()
    {
        if (!preg_match("/[a-zåäö]/", $this->data["pass1"]) > 0) {
            $this->errors['pass1'][] = '&#10005;pass1 must contain a least one lowercase character<br>';
        }
        if (!preg_match("/[A-ZÅÄÖ]/", $this->data["pass1"]) > 0) {
            $this->errors['pass1'][] = '&#10005; pass1 must contain a least one uppercase character<br>';
        }
        if (!preg_match("/[0-9]/", $this->data["pass1"]) > 0) {
            $this->errors['pass1'][] = '&#10005; pass1 must contain a least one alphanumeric<br>';
        }
        if (!preg_match("/[#%&¤_\*\-\+\@\!\?\(\)\[\]\$£€]/", $this->data["pass1"]) > 0) {
            $this->errors['pass1'][] = '&#10005; pass1 must contain a least one special character<br>';
        }
        if (!preg_match("/^.{8,40}$/", $this->data["pass1"]) > 0) {
            $this->errors['pass1'][] = '&#10005; pass1 must at least 8 character long<br>';
        }
        if (!preg_match("/^.{8,40}$/", $this->data["pass1"]) > 0) {
            $this->errors['pass1'][] = '&#10005; pass1 must at least 8 character long<br>';
        }
    }
    public function validateEmail()
    {
        if (!filter_var($this->data["mail"], FILTER_VALIDATE_EMAIL)) {
            $this->errors['mail'][] = "<p>&#10005;Invalid email format</p>";
        }
    }

    public function showErrors($type)
    {
        if (array_key_exists($type, $this->errors)) {
            # code...
        echo "<p>";
        foreach ($this->errors[$type] as $error) {
            echo $error;
        }
        echo "</p>";
    }

    }
   
}
