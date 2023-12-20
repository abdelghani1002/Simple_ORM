<?php

require "../src/ObjectRelationalMapping.php";

$pdo = new PDO('mysql:host=localhost;dbname=ormDB', 'root', 'Abd2001/02/25');

$orm = new ObjectRelationalMapping($pdo, 'users');

// Create example
$userData = ['name' => 'AIT TAMGHART',"email" => "aaittamghart8@gmail.com", 'age' => 22];
$created = $orm->create($userData);
echo $created ? "user created successfully<br>\n" : "Error !!\n";

// // Read by ID example
// $user = $orm->read(7);
// if ($user) {
//     echo "User informations : \n";
//     var_dump($user);
// } else {
//     echo "No user founded!\n";
// }

// // Update example
// $updatedData = ['age' => 23];
// $updated = $orm->update(7, $updatedData);

// echo $updated ? "User age updated successfully\n" : "Error !!\n";

// // Delete example
// $deleted = $orm->delete(7);
// echo $deleted ? "User has been removed successfully\n" : "Error\n";