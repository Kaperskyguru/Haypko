<?php
/**
 *
 */
abstract class Controller
{
    function __construct()
    {

    }

    public function model($model)
    {
        require_once('../app/models/'. $model . '.php');
        return new $model(new Database());
    }

    public function views($view, $data=[])
    {
        if (file_exists('../app/views/'. $view . '.php')) {
            require_once '../app/views/'. $view . '.php';
        } else {
            die("Page/View not found");
        }
    }
}
