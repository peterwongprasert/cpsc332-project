<?php

  require './connect.php';

  if(isset($_GET['d'])){
    // deletion code
    $d = $_GET['d'];
    echo $d;
    $sql = "DELETE FROM `Event` WHERE `EventID` = $d";

  }else{
    // posting code

    if(isset($_POST['event_name'])){
      $name = $_POST['event_name'];
    }
    if(isset($_POST['description'])){
      $description = $_POST['description'];
    }
    if(isset($_POST['capacity'])){
      $capacity = $_POST['capacity'];
    }
    if(isset($_POST['start_time'])){
      $startTime = $_POST['start_time'];
    }
    if(isset($_POST['end_time'])){
      $endTime = $_POST['end_time'];
    }
    if(isset($_POST['deadline'])){
      $deadline = $_POST['deadline'];
    }
    if(isset($_POST['event_type'])){
      $eventType = $_POST['event_type'];
    }
    if(isset($_POST['sponsor'])){
      $sponsor = $_POST['sponsor'];
    }
    if(isset($_POST['presenter'])){
      $presenter = $_POST['presenter'];
    }
    if(isset($_POST['speaker'])){
      $speaker = $_POST['speaker'];
    }
    if(isset($_POST['host'])){
      $host = $_POST['host'];
    }
    if(isset($_POST['organizer'])){
      $organizer = $_POST['organizer'];
    }
  
    $sql = "INSERT INTO `Event`(
      `EventName`, 
      `Descript`, 
      `Organizer`, 
      `MaxCap`, 
      `StartTime`, 
      `EndTime`, 
      `Deadline`, 
      `isPublished`, 
      `HostedBy`, 
      `EventType`, 
      `Presenter`, 
      `Speaker`, 
      `EventStatus`
      ) VALUES (
      '$name', 
      '$description', 
      $organizer, 
      $capacity, 
      '$startTime', 
      '$endTime', 
      '$deadline', 
      1, 
      $host, 
      $eventType, 
      $presenter, 
      $speaker, 
      1
    )";
  
    
    
    header("Location: home.php");
  }
mysqli_query($db, $sql);
  
exit();