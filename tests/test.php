<?php

require "./src/ORM.php";

// connection to database
$pdo = new PDO('mysql:host=localhost;dbname=ormDB', 'root', 'Abd2001/02/25');

// ORM Create 
$orm = new ObjectRelationalMapping($pdo, 'users');

// user example
$userData = ['name' => 'AIT TAMGHART',"email" => "aaittamghart8@gmail.com", 'age' => 22];
$created = $orm->create($userData);

echo $created ? "user created successfully\n" : "Error !!\n";

// Read by ID
$user = $orm->read(5);

if ($user) {
    echo "User informations : \n";
    print_r($user);
} else {
    echo "No user founded!\n";
}

// Update user age
$updatedData = ['age' => 23];
$updated = $orm->update(5, $updatedData);

echo $updated ? "User age updated successfully\n" : "Error !!\n";

// Delete a user by ID
$deleted = $orm->delete(4);
echo $deleted ? "User has been removed successfully\n" : "Error\n";