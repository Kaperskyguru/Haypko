<?php
ob_start();
// Simple Page redirector
function redirector($location)
{
    echo SITEURL;
    header('location: '. SITEURL. '/'. $location);
}

function get_formatted_date($date)
{
  return date('l jS \of F Y', strtotime($date));
}
