<?php
function checkEmail($clientEmail){
 $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
 return $valEmail;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);   
}

function createNav($classifications){
$navList = '<ul class="navigation">';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
    $navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName="
    .urlencode($classification['classificationName']).
    "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a>
   </li>";
}
$navList .= '</ul>';

return $navList;
}


function generateList($classifications){
$dropDownList = "<br><select name ='classificationId' class ='dropdownlist'><option> Choose one options</option>";
foreach ($classifications as $classification){
    // print_r($classification);
    $dropDownList .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
        if($classification['classificationId'] == $classificationId){
                    $dropDownList .= ' selected ';
        }
    }
    $dropDownList .= ">$classification[classificationName]</option>";
}
$dropDownList .= ("</select><br>");

return $dropDownList;
}

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    
    echo $js_code;
}

function displayLoginMessage($clientFirstname){
    $message = "Thanks for registering $clientFirstname. Please use your email and password to login.";
    return $message;
}

function buildClassificationList($classifications){ 
    $classificationList = '<select class="dropdownlist" name="classificationId" id="classificationList">'; 
    $classificationList .= "<option>Choose a Classification</option>"; 
    foreach ($classifications as $classification) { 
     $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
    } 
    $classificationList .= '</select>'; 
    return $classificationList; 
}

// Get vehicles by classificationId 
function getInventoryByClassification($classificationId){ 
    $db = phpmotorsConnect(); 
    $sql = 'SELECT * FROM inventory WHERE classificationId = :classificationId'; 
    $stmt = $db->prepare($sql); 
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT); 
    $stmt->execute(); 
    $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    $stmt->closeCursor(); 
    return $inventory; 
}

function getVehiclesByClassification($classificationName){
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM images JOIN inventory ON images.invId = inventory.invId WHERE classificationId IN (SELECT classificationId FROM carclassification WHERE classificationName = :classificationName) AND imgName REGEXP"-tn.jpg"';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);
    $stmt->execute();
    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $vehicles;
}

function buildVehiclesDisplay($vehicles){
    $dv = '<ul id="inv-display">';
    foreach ($vehicles as $vehicle) {
     $dv .= '<li class="car-lists">';
     $dv .= '<div class="height-auto">';
     $dv .= "<img src='$vehicle[imgPath]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
     $dv .= '</div>';
     $dv .= '<hr>';
     $dv .= "<p><a href='/phpmotors/vehicles/?action=details&invId=$vehicle[invId]'><h2>$vehicle[invMake] $vehicle[invModel]</h2></a></p>";
     $dv .= "<span>$vehicle[invPrice]</span>";
     $dv .= '</li>';

    }
    $dv .= '</ul>';
    return $dv;
}


function displayVehicleInfo($invInfo2){
    $format = number_format($invInfo2['invPrice'],0);
    $th ="<h1 class='car-title'>$invInfo2[invMake] $invInfo2[invModel]</h1>";
    $th .='<div class="display-information">';
    $th .='<div class="info-vehicle">';
    $th .="<img src='$invInfo2[imgPath]' alt='Image of $invInfo2[invMake] $invInfo2[invModel] on phpmotors.com'>";
    $th .='</div>';
    $th .='<div>';
    $th .="<h3 class='car-info1'>$invInfo2[invMake] $invInfo2[invModel] Details</h3>";
    $th .="<p class='car-info grey-box'>$invInfo2[invDescription]</p>";
    $th .="<p class='car-info'>Color: $invInfo2[invColor]</p>";
    $th .='</div>';
    $th .='</div>';
    $th .="<p class='car-info2'>Price: $$format</p>";
  
    return $th;
}


function getResults($rows){
    $rw = '<div>';
    $rw .= '<h3 class="listTitle"><a href="/phpmotors/vehicles/?action=details&invId='.$rows['invId'].'">'. $rows['invYear'] . " " .$rows['invMake']. " " .$rows['invModel'] .'</a></h3>';
    $rw .= '</div>';
    $rw .= '<div class="listDescription">';
    $rw .= '<p>' . $rows['invDescription'] . '</p>';
    $rw .= '</div>';
    return $rw;
}
