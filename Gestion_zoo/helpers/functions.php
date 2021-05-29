<?php

function debug($vars)
{
    echo "<pre>";
       var_dump($vars);
    echo "</pre>";

    exit;
}

function printArray($vars)
{
    echo "<pre>";
    print_r($vars);
    echo "</pre>";

    exit;
}

function redirect($page = FALSE, $session_name, $message = NULL, $message_type = NULL)
{
    if (is_string($page)) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }

    //Check For Message
    if ($message != NULL) {
        //Set Message
        $_SESSION[$session_name] = $message;
    }
    //Check For Type
    if ($message_type != NULL) {
        //Set Message Type
        $_SESSION['message_type'] = $message_type;
    }

    //Redirect
    header('Location: ' . $location);
    exit;
}

/*
 * Display Message
 * 
 * 
 */
function displayMessage($session_name)
{
    if (!empty($_SESSION[$session_name])) {

        //Assign Message Var
        $message = $_SESSION[$session_name];

        if (!empty($_SESSION['message_type'])) {
            //Assign Type Var
            $message_type = $_SESSION['message_type'];
            //Create Output
            if ($message_type == 'error') {
                echo '<div class="alert alert-danger">' . $message . '</div>';
            } else {
                echo '<div class="alert alert-success>' . $message . '</div>';
            }
        }
        //Unset Message
        unset($_SESSION[$session_name]);
        unset($_SESSION['message_type']);
        session_destroy();
    } else {
        echo '';
    }
}

/*
 * Check If User Is Logged In
 */
function isLoggedIn($session_name)
{
    if (!isset($_SESSION[$session_name])) {
        return false;
    } else {
        return true;
    }
}

function Secure($string)
{
    return trim(strip_tags($string));
}


function createSession($session_name, $type, $message)
{
    return $_SESSION[$session_name] = [$type, $message];
}

function getInputValue($name)
{
    if (isset($_POST[$name])) {

        echo $_POST[$name];
    }
}


function importData($view,$data=NULL)
{

    require_once $view;
    
    

}
