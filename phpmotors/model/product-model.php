<?php
// vehicles model


// new function handle site registrations

function specificVehicle($invId): Array{
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'SELECT invMake, invModel, invPrice FROM inventory WHERE invId = :invId'; 
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    // Insert the data
    $stmt->execute();
    $data = $stmt->fetchAll();
    $stmt->closeCursor();

    return $data;
   }

   function allVehicle(): Array{
      // Create a connection object from the phpmotors connection function
      $db = phpmotorsConnect(); 
      // The SQL statement to be used with the database 
      $sql = 'SELECT * FROM inventory'; 
      // The next line creates the prepared statement using the phpmotors connection      
      $stmt = $db->prepare($sql);
      // The next line runs the prepared statement 
      $stmt->execute(); 
      // The next line gets the data from the database and 
      // stores it as an array in the $classifications variable 
      $allVehicles = $stmt->fetchAll(); 
      // The next line closes the interaction with the database 
      $stmt->closeCursor(); 
      // The next line sends the array of data back to where the function 
      // was called (this should be the controller) 
      return $allVehicles;
   }