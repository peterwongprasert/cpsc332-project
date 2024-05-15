<?php

  require './connect.php';

  if(isset($_GET['fname'])){

    $sql = "INSERT INTO `User` (Fname, Lname, Email, Pw, Phone)
    VALUES(?, ?, ?, ?, ?)";

    $stmt = $db->prepare($sql);
    if($stmt === false){
      die("Error in preparing statement: " . $db->error);
    }

    $stmt->bind_param('sssss', $fname, $lname, $email, $pw, $phone);

    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $pw = $_GET['password'];
    $email = $_GET['email'];
    $phone = $_GET['phone-number'];

    // $stmt->execute();
    if ($stmt->execute() === false) {
      die("Error in executing statement: " . $stmt->error);
    }
  }