<?php
    // Main include file

    // Start a session if we are not running from CLI
    if (php_sapi_name() != 'cli') {
        session_start();
    }
    
    // Class autoloader
    spl_autoload_register(function ($class) {
        require 'class.'.$class.'.php';
    });

    // DB config
    $dbhost = 'localhost';
    $dbuser = 'ipcam';
    $dbpass = 'Ipcam_1988';
    $dbdb = 'ipcam';

    $db = new mdb($dbhost, $dbuser, $dbpass, $dbdb);

    // Check user
    if (!isset($page_no_login) || $page_no_login === false) {
        user::check_logged_in($db);
    }
