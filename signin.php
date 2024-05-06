<?php
  session_start();

  // connecting to db
  require 'connect.php';

  // variables 
  $id;
  $name;

  if(isset($_POST['username'])){
    $name = $_POST['username'];
  }
  if(isset($_POST['password'])){
    $pw = $_POST['password'];
  }  

  $sql = "SELECT UserID, Fname 
    FROM `User` 
    WHERE `Fname` = ? AND `Pw` = ?";

  $stmt = $db->prepare($sql);

  $stmt->bind_param("ss", $name, $pw);
  $stmt->execute();
  $result = $stmt->get_result();

  while($row = $result->fetch_assoc()){
  //  echo "UserID: " . $row['UserID'];
    $id = $row['UserID'];
    $name = $row['Fname'];
  }
  $result->free();

  if($id){
    $sArray = array("id" => $id, "name" => $name);
    echo json_encode($sArray);
  }

?>