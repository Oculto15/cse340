<?php

//Accounts Controller

// Get the database connection file
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/library/connections.php';
// Get the PHP Motors model for use as needed
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/model/main-model.php';

// Get the array of classifications
$classifications = getClassifications();
// Build a navigation bar using the $classifications array
$navList = '<ul class="navigation">';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
$navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';
// echo $navList;

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}
switch ($action) {
    case 'login-page':
        include '../views/signin.php';
        break;
    case 'registration-page':
        include '../views/registration.php';
        break;
    default:
        include '.views/home.php';
}


// var_dump($classifications);
// 	exit;


    