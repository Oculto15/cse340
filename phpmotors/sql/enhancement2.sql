/*
    Insert a client into the clients table
*/

-- Insert the following new client to the clients table
INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword, clientLevel, comment) 
Values ('Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', 1, "I am the real Ironman")

-- Modify the Tony Stark record to change the clientLevel to 3
UPDATE clients
SET clientLevel = 3
WHERE clientFirstname = 'Tony';

-- Modify the "GM Hummer" record to read "spacious interior" rather than "small interior"
UPDATE inventory
SET invDescription = REPLACE(invDescription, "small", "spacious")
WHERE invId = 12;

-- Use an inner join to select the invModel field from the inventory table and the classificationName field
SELECT invModel
FROM inventory
INNER JOIN carclassification ON inventory.classificationId = carclassification.classificationId
WHERE classificationName = "SUV";

-- Delete the Jeep Wrangler from the database.
DELETE FROM inventory
WHERE invId = 1;

-- Update all records in the Inventory table to add "/phpmotors"
UPDATE inventory
SET invImage = CONCAT("/phpmotors", invImage), invThumbnail = CONCAT("/phpmotors", invThumbnail)