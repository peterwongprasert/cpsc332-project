<?php

  // require './connect.php';
  $user = "root";
  $pw = "";
  $dbName = "test";

  $db = new mysqli("localhost", $user, $pw, $dbName);

  if ($db->connect_errno) {
    die("Failed to connect to MySQL: " . $db->connect_error);
  }

  // if(isset($_POST['join']) && isset($_POST['id'])){
    $eventID = $_GET['join'];
    $userID = $_GET['id'];
    // echo $eventID . "<br>";
    // echo $userID . "<br>";
    
    $sql = "INSERT INTO `Attends`(`AttendeeID`, `EventID`)
    VALUES($eventID, $userID)";
  // }
  
  $result = mysqli_query($db, $sql);

  if ($result) {
      echo 'Success';
  } else {
      echo 'Error: ' . mysqli_error($db);
  }
// echo 'success';
  
exit();