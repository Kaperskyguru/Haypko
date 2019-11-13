<?php

define('DB_HOST', 'db4free.net');
define('DB_USER', 'kapman');
define('DB_PASS', 'Changeless11');
define('DB_NAME', 'haypkodb');

define('USERNAME', 'Owumi2244');
define('PASSWORD', 'Dtdcchub1');

define('APPROOT', dirname(dirname(__FILE__)));

define('SITEURL', 'http://localhost/Enyopay');

define('SITENAME', 'Haykpo');

define('USER_TYPE', 'partner');

define('ADMIN_TYPE', 'admin');

if (!defined('TODAY')) {
    define('TODAY', (new DateTime('today'))->format('m/d/Y'));
}

define('PK', 'pk_test_58ab90adc79aae5a3580784b716109a1c5a8c307');

define('SK', 'sk_test_d0f6e2672fd5d1b7b9da7efdd9ce3974a7cb1ec5');
