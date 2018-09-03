<?php

function generateHashes($data)
{
    return password_hash($data, PASSWORD_DEFAULT);
}

function generateRandomPassword()
{
    $text = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ012346789!(*&%)"),0,9);
    $time = substr(time(),6,4);
    $string = $text.$time;
    return $string;
}

function getMonth($time)
{
    $time = strtotime($time);
    $month = date("F",$time);
    return $month;
}

function getYear($time)
{
    $time = strtotime($time);
    $year = date("Y",$time);
    return $year;
}
