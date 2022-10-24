<?php
ini_set('display_errors',1);

//Accounts Controller

// Get the database connection file
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/library/connections.php';
// Get the PHP Motors model for use as needed
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/model/main-model.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/model/product-model.php';

// Get the array of classifications
$classifications = getClassifications();
// Build a navigation bar using the $classifications array
$navList = '<ul class="navigation">';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
    $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';


$invId = filter_input(INPUT_GET, 'invId');
if ($invId) {
    $vehicle = specificVehicle($invId);
    }
else {
    $vehicle = allVehicle();
}


$dropDownList = "<br><table class ='dropdownlist'>";
foreach ($vehicle as $allVehicle){
    // print_r($allVehicle);
    $dropDownList .= "<tr>";
    $dropDownList .= "<td>$allVehicle[invMake]</td> <td>$allVehicle[invModel]</td> <td>$allVehicle[invPrice]</td>";
    $dropDownList .= "</tr>";
}
$dropDownList .= ("</table><br>");





require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/views/products.php';
