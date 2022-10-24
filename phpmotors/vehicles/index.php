<?php
// ini_set('display_errors',1);

//Accounts Controller

// Get the database connection file
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/library/connections.php';
// Get the PHP Motors model for use as needed
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/model/main-model.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/model/vehicles-model.php';

// Get the array of classifications
$classifications = getClassifications();
// Build a navigation bar using the $classifications array
$navList = '<ul class="navigation">';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
    $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';



$dropDownList = "<br><select name ='classificationId' class ='dropdownlist'><option> Choose one options</option>";
foreach ($classifications as $classification){
    // print_r($classification);
    $dropDownList .= "<option value='$classification[classificationId]'> $classification[classificationName]</option>";
}
$dropDownList .= ("</select><br>");


// echo $dropDownList;

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}
switch ($action) {
    case 'addVehicle':
        // print_r($_REQUEST);
        // die;

        // Filter and store the data
        $invMake = filter_input(INPUT_POST, 'invMake');
        $invModel = filter_input(INPUT_POST, 'invModel');
        $invDescription = filter_input(INPUT_POST, 'invDescription');
        $invImage = filter_input(INPUT_POST, 'invImage');
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
        $invPrice = filter_input(INPUT_POST, 'invPrice');
        $invStock = filter_input(INPUT_POST, 'invStock');
        $invColor = filter_input(INPUT_POST, 'invColor');
        $classificationId = filter_input(INPUT_POST, 'classificationId');

        // Check for missing data
        if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage)|| empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)) {
            $message = "<p class='message'>Please provide information for all empty form fields.</p>";
            include '../views/add_vehicle.php';
            exit;
        }

        // Send the data to the model
        $regOutcome = addVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
        
        if($regOutcome === 1){
            $message = "<p class='message'>The $invMake $invModel was added successfully!</p>";
            include '../views/add_vehicle.php';
            exit;
        }

    case 'addClassification':

        // Filter and store the data
        $classificationName = filter_input(INPUT_POST, 'classificationName');

        // Check for missing data
        if (empty($classificationName) ) {
            $message = "<p class='message'>Please provide information for all empty form fields.</p>";
            include '../views/add-classificacion.php';
            exit;
        }

        $outcome = addName($classificationName);

        if($outcome === 1){
            header("Location: /phpmotors/vehicles/index.php");
            exit;
        }
        
    case 'classification-page':
        include '../views/add-classificacion.php';
        break;
    case 'vehicle-page':
        include '../views/add_vehicle.php';
        break;
    default:
        include '../views/vehicle-management.php';
        break;
}