<?php

// Create or access a Session
session_start();

// Get the database connection file
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/library/connections.php';
// Get the PHP Motors model for use as needed
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/model/main-model.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/library/functions.php';


// Get the array of classifications
$classifications = getClassifications();
// Build a navigation bar using the $classifications array
$navList = createNav($classifications);


// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

if(isset($_COOKIE['lastname'])){
    $cookieLastname = filter_input(INPUT_COOKIE, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}


$action = trim(filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
if ($action == NULL) {
    $action = trim(filter_input(INPUT_POST, 'action',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
}
switch ($action) {
    case "template":
        include './views/templete.php';
        break;
    default:
        include "./views/home.php";  
}

// var_dump($classifications);
// 	exit;



    