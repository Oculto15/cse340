<?php

//Accounts Controller
ini_set("display_errors",1);
// Get the database connection file
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/library/connections.php';
// Get the PHP Motors model for use as needed
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/model/main-model.php';
// Get the accounts model
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/model/accounts-model.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/library/functions.php';


// Get the array of classifications
$classifications = getClassifications();
// Build a navigation bar using the $classifications array
$navList = '<ul class="navigation">';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
    $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}
switch ($action) {

    case 'register':
        // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientEmail = trim(checkEmail(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL)));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $checkPassword = trim(checkPassword($clientPassword));

        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
            $message = "<p class='message'>Please provide information for all empty form fields.</p>";
            include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/views/registration.php';
            exit;
        }

        // Send the data to the model

        $hashedPassword = password_hash($checkPassword, PASSWORD_DEFAULT);

        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

        // Check and report the result
        if($regOutcome === 1){
            $message = "<p class='message'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            include '../views/signin.php';
            exit;
           } else {
            $message = "<p class='message'>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            echo $message;
            include '../views/registration.php';
            exit;
        }
        break;
    case 'login-page':
        include '../views/signin.php';
        break;
    case 'registration-page':
        include '../views/registration.php';
        break;
    case 'login':
        $clientEmail = checkEmail(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $checkPassword = checkPassword($clientPassword);

        if (empty($clientEmail) || empty($checkPassword)) {
            $message = "<p class='message'>Please provide information for all empty form fields.</p>";
            include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/views/signin.php';
            exit;
        }
        break;
    default:
        include '../views/home.php';
}


// var_dump($classifications);
// 	exit;
