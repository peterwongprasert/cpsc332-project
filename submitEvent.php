<?php

  require './connect.php';

  if(isset($_POST['event_name'])){
    $name = $_POST['event_name'];
    // echo $name. "<br>";
  }
  if(isset($_POST['description'])){
    $description = $_POST['description'];
    // echo $description. "<br>";
  }
  if(isset($_POST['capacity'])){
    $capacity = $_POST['capacity'];
    // echo $capacity. "<br>";
  }
  if(isset($_POST['start_time'])){
    $startTime = $_POST['start_time'];
    // echo $start_time. "<br>";
  }
  if(isset($_POST['end_time'])){
    $endTime = $_POST['end_time'];
    // echo $end_time. "<br>";
  }
  if(isset($_POST['deadline'])){
    $deadline = $_POST['deadline'];
    // echo $deadline. "<br>";
  }
  if(isset($_POST['event_type'])){
    $eventType = $_POST['event_type'];
    // echo $event_type. "<br>";
  }
  if(isset($_POST['sponsor'])){
    $sponsor = $_POST['sponsor'];
    // echo $sponsor. "<br>";
  }
  if(isset($_POST['presenter'])){
    $presenter = $_POST['presenter'];
    // echo $presenter. "<br>";
  }
  if(isset($_POST['speaker'])){
    $speaker = $_POST['speaker'];
    // echo $speaker. "<br>";
  }
  if(isset($_POST['host'])){
    $host = $_POST['host'];
    // echo $host. "<br>";
  }
  if(isset($_POST['organizer'])){
    $organizer = $_POST['organizer'];
    // echo $organizer. "<br>";
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

mysqli_query($db, $sql);

header("Location: home.php");
exit();