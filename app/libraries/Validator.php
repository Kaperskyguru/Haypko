<?php

class Validator
{
    private $errors;

    public function __construct()
    {

    }

    public static function make(array $data, array $rules)
    {
        if (self::validatePassword($data['upass']) && self::validateUsername($data['uname'])) {
            return $data;
        } 
    }

    private function validatePassword(string $password, $min = 8, $max = 128)
    {
        if (Validators::required($password) && Validators::checkLength($password, $min, $max)) {
            $this->errors['password_err'] = 'Please enter a valid password';
            return false;
        }
        return true;
    }

    private function validateUsername(string $username)
    {
        if (Validators::required($username) && Validators::isUsername($username)) {
            $this->errors['username_err'] = 'Please enter a valid username';
            return false;
        }
        return true;
    }

    private function validateEmail(string $email)
    {
        if (Validators::required($email) && Validators::isEmailAddress($email)) {
            $this->errors['email_err'] = 'Please enter a valid email';
            return false;
        }
        return true;
    }

    private function validateName(string $name)
    {
        if (Validators::required($name) && Validators::isValidName($name)) {
            $this->errors['name_err'] = 'Please enter a valid name';
            return false;
        }
        return true;
    }

    private function validateErrors()
    {
        return $this->errors . length > 0;
    }

}
