<?php
  require './connect.php';

  $userTable = "CREATE TABLE `User`(
    UserID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    Fname VARCHAR(16) NOT NULL,
    Lname VARCHAR(16),
    Email VARCHAR(16) NOT NULL UNIQUE,
    Pw VARCHAR(32) NOT NULL,
    Phone VARCHAR(16) NOT NULL,
    CreatedAt DATE DEFAULT CURRENT_TIMESTAMP
    )";

  if ($db->query($userTable)) {
    echo "Table User created successfully";
  } else {
    echo "Error creating table: " . $db->error;
  }

?>