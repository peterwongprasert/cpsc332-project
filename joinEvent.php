<?php

  require './connect.php';

  if ($db->connect_errno) {
    die("Failed to connect to MySQL: " . $db->connect_error);
  }

  if(isset($_POST['join']) && isset($_POST['id'])){
    
    $sql = "INSERT INTO `Attends` (AttendeeID, EventID)
    VALUES (?, ?)";

// INSERT INTO `Attends` (AttendeeID, EventID)
// SELECT YourValues
// FROM YourOtherTable
// WHERE (SELECT COUNT(EventID) FROM Attends WHERE EventID = YourEventID) < 40;

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

  }

  if(isset($_POST['unjoin']) && isset($_POST['id'])){
    
    $sql = "DELETE FROM `Attends` 
    WHERE `AttendeeID` = ? AND `EventID` = ?";

    $stmt = $db->prepare($sql);

    if ($stmt === false) {
      die("Error in preparing statement: " . $db->error);
    }
    $stmt->bind_param("ii", $attendeeID, $eventID);

    $attendeeID = $_POST['id'];
    $eventID = $_POST['unjoin'];

    if ($stmt->execute() === false) {
      die("Error in executing statement: " . $stmt->error);
    }
    
  }
  
  // $result = mysqli_query($db, $sql);

  // if ($result) {
  //     echo 'Success';
  // } else {
  //     echo 'Error: ' . mysqli_error($db);
  // }
// echo 'success';
  
exit();