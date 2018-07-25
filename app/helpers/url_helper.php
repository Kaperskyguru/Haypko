<?php
ob_start();
// Simple Page redirector
function redirector($location)
{
    echo SITEURL;
    header('location: '. SITEURL. '/'. $location);
}
