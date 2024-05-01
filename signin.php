<?php
  session_start();

  // connecting to db
  require 'connect.php';

  // variables 
  $id;
  if(isset($_POST['username'])){
    $name = $_POST['username'];
  }
  if(isset($_POST['password'])){
    $pw = $_POST['password'];
  }  

  $sql = "SELECT UserID 
    FROM `User` 
    WHERE `Fname` = ? AND `Pw` = ?";

  $stmt = $db->prepare($sql);

  $stmt->bind_param("ss", $name, $pw);
  $stmt->execute();
  $result = $stmt->get_result();

  while($row = $result->fetch_assoc()){
  //  echo "UserID: " . $row['UserID'];
    $id = $row['UserID'];
  }

  if($id){
    // echo $id . " <br>Sign in";
    $_SESSION['id'] = $id;
    echo "success";
  }

?>