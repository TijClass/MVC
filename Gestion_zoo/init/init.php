<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
//--------------------------//
//      SESSIONS           //
//------------------------//
ini_set('session.cookie_lifetime', false);
session_start();

//Include Configuration
require_once('core/config.php');
include_once('helpers/functions.php');
include_once('helper_classes/Database.php');
include_once 'controllers/Autoloader/AutoLoader.php';
Autoloader::register();
