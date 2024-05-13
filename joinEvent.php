<?php

  require './connect.php';
  // $user = "root";
  // $pw = "";
  // $dbName = "test";

  // $db = new mysqli("localhost", $user, $pw, $dbName);

  if ($db->connect_errno) {
    die("Failed to connect to MySQL: " . $db->connect_error);
  }

  // if(isset($_POST['join']) && isset($_POST['id'])){
    
    // echo $eventID . "<br>";
    // echo $userID . "<br>";

    $sql = "INSERT INTO `Attends` (AttendeeID, EventID)
    VALUES (?, ?)";

    $stmt = $db->prepare($sql);

    if ($stmt === false) {
      die("Error in preparing statement: " . $db->error);
    }

    $stmt->bind_param("ii", $attendeeID, $eventID);


    // $eventID = 16;
    // $attendeeID = 3;

    $eventID = $_POST['join'];
    $attendeeID = $_POST['id'];

    if ($stmt->execute() === false) {
      die("Error in executing statement: " . $stmt->error);
    }
    // $sql = "INSERT INTO `Attends`(`AttendeeID`, `EventID`)
    // VALUES($eventID, $userID)";
  // }
  
  // $result = mysqli_query($db, $sql);

  // if ($result) {
  //     echo 'Success';
  // } else {
  //     echo 'Error: ' . mysqli_error($db);
  // }
// echo 'success';
  
exit();