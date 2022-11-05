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
    $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
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