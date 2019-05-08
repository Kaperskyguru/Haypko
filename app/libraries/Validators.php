<?php
class Validators
{
    public function __construct()
    {

    }

    public static function required(string $str)
    {
        return $str == "" || empty($str) || !isset($str) || $str == -1;
    }

    public static function digit(string $str)
    {
        return ctype_digit($str);
    }

    public static function isEmailAddress(string $email)
    {
        $pattern = "/^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+/";
        return preg_match($pattern, $email);
    }

    public static function checkLength(string $str, $min, $max)
    {
        return strlen($str) <= $min && strlen($str) <= $max;
    }

    public function isValidName(string $name)
    {
        $pattern = "/^[a-zA-Z ]+$/";
        return preg_match($pattern, $name);
    }

    public function isUsername(string $name)
    {

        $pattern = "[^A-Za-z0-9]";
        return !preg_match($pattern, $name);
    }

}
