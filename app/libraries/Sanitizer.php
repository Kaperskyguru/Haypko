<?php
class Sanitizer
{
    private static $instance;

    private function __construct()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    }

    public static function getInstance()
    {

        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    private function basicSanitize($data)
    {
        $data = htmlspecialchars($data, ENT_QUOTES);
        $data = trim($data);
        return $data;
    }

    private function s($data)
    {
        foreach ($data as $k => $v) {
            $data[$k] = $this->basicSanitize($v);
        }
        return $this->$clean = $data;
    }

    public static function sanitize($data)
    {
        return Sanitizer::getInstance()->s($data);
    }

}
