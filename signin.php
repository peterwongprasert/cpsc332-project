<?php

require 'connect.php';

if(isset($_POST['username'])){
  $name = htmlspecialchars($_POST['username']);
}
if(isset($_POST['password'])){
  $pw = htmlspecialchars($_POST['password']);
}  

$sql = "SELECT COUNT(*) 
  FROM `User` 
  WHERE Name = ? AND Password = ?";



?>