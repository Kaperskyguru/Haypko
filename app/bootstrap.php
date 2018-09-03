<?php

    require_once 'config/config.php';
    require_once 'helpers/session_helper.php';
    require_once 'helpers/functions.php';
    require_once 'helpers/flash_helper.php';
    require_once 'helpers/url_helper.php';
    require_once '../vendor/autoload.php';
    require_once 'helpers/mailer.php';

    spl_autoload_register(function ($className)
    {
        require_once 'libraries/' . $className . '.php';
    });
