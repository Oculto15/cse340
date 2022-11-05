<?php

// Create or access a Session
session_start();

//Accounts Controller
ini_set("display_errors",1);
// Get the database connection file
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/library/connections.php';
// Get the PHP Motors model for use as needed
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/model/main-model.php';
// Get the accounts model
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/model/accounts-model.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/library/functions.php';

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

if(isset($_COOKIE['lastname'])){
    $cookieLastname = filter_input(INPUT_COOKIE, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

// Get the array of classifications
$classifications = getClassifications();
// Build a navigation bar using the $classifications array
$navList = createNav($classifications);

$action = trim(filter_input(INPUT_GET, 'action',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
if ($action == NULL) {
    $action = trim(filter_input(INPUT_POST, 'action',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
}
switch ($action) {

    case 'register':
        // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientEmail = trim(checkEmail(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL)));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $checkPassword = checkPassword($clientPassword);

        // Check for existing email address in the table 
        $existingEmail = checkExistingEmail($clientEmail);
        
        if($existingEmail){
            $message = '<p class="notice message">That email address already exists. Do you want to login instead?</p>';
            include '../views/registration.php';
            exit;
        }

        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
            $message = "<p class='message'>Please provide information for all empty form fields.</p>";
            include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/views/registration.php';
            exit;
        }

        // hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        // send the data to the model if no errors exist
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

        //Check and report the result
        if($regOutcome === 1){

            $_SESSION['message'] = "<p class='message'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            header('Location: /phpmotors/accounts/?action=login');
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
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $checkPassword = checkPassword($clientPassword);

        if (empty($clientEmail) || empty($checkPassword)) {
            
            $message = "<p class='message'>Please provide information for all empty form fields.</p>";
            include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/views/signin.php';
            exit;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address

        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        // console_log($clientEmail);
        // console_log($clientPassword);
        // console_log($clientData['clientPassword']);
        // console_log($hashCheck);
        if(!$hashCheck) {
        $_SESSION['message'] = '<p class="notice message">Please check your password and try again.</p>';
        include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/views/signin.php';
        exit;
        }
        // console_log("line 109");
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;

        setcookie('firstname', $clientData['clientFirstname'], strtotime('+1 year'), '/');
        setcookie('lastname', $clientData['clientLastname'], strtotime('+1 year'), '/');
        // Send them to the admin view
        include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/views/admin.php';
        exit;
        break;
    case 'logout':
        session_unset();
        session_destroy();
        header('Location: /phpmotors/index.php');
        break;
    case 'vehicle-management':
        include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/views/vehicle-management.php';
        break;
    default:
        include '../views/home.php';
}


// var_dump($classifications);
// 	exit;
