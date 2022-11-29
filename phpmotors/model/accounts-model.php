<?php
// accounts model


// new function handle site registrations

function regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO clients (clientFirstname, clientLastname,clientEmail, clientPassword)
        VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword)';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}


// Check for an existing email address
function checkExistingEmail($clientEmail) {
    $db =  phpmotorsConnect();
    $sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if(empty($matchEmail)){
     return 0;
    } else {
     return 1;
    }
}

// Get client data based on an email address
function getClient($clientEmail){
    $db = phpmotorsConnect();
    $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :clientEmail';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
}


function newsLetter($firstName, $lastName, $email){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO newsletter (firstName, lastName, email)
        VALUES (:firstName, :lastName, :email)';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $newsletter = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $newsletter;
}

function updatePassword($clientPassword) {
    $db = phpmotorsConnect();
    $sql = 'UPDATE clients SET clientPassword = :clientPassword';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
    $stmt->execute();
    $passwordChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $passwordChanged;
}

function getClientInfo($clientId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM clients WHERE clientId = :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $clientInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientInfo;
}

function updateAccount($clientId, $clientFirstname, $clientLastname, $clientEmail) {
    $db = phpmotorsConnect();
    $sql = 'UPDATE clients SET clientFirstname = :clientFirstname, clientLastname = :clientLastname, clientEmail = :clientEmail  WHERE clientId = :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $accountChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $accountChanged;
}

function getSearch($k, $pageNUm){
    $offSet = $pageNUm * 10;
    $db = phpmotorsConnect();
    $sql = "SELECT * FROM inventory WHERE invDescription LIKE CONCAT('%',:k,'%') OR invColor LIKE CONCAT('%',:k,'%') LIMIT 10 OFFSET :offSet";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':k', $k, PDO::PARAM_STR);
    $stmt->bindValue(':offSet', $offSet, PDO::PARAM_INT);
    $stmt->bindValue(':pageNUm', $pageNUm, PDO::PARAM_INT);
    $stmt->execute();
    $search = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $search;
}

function getSearchNum($k){
    $db = phpmotorsConnect();
    $sql = "SELECT COUNT(*) FROM inventory WHERE invDescription LIKE CONCAT('%',:k,'%') OR invColor LIKE CONCAT('%',:k,'%')";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':k', $k, PDO::PARAM_STR);
    $stmt->execute();
    $search = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $search;
}