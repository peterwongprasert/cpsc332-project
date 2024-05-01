<?php

  $user = "root";
  $pw = "";
  $dbName = "test";

  $db = new mysqli("localhost", $user, $pw, $dbName);

  if ($db->connect_errno) {
    die("Failed to connect to MySQL: " . $db->connect_error);
  }

  
  // EXAMPLE on how to use SELECT in PHP using prepared statements
  // $sql = "SELECT * FROM `Sponsor`";
  // $results = $db->query($sql);

  // while($row = $results->fetch_assoc()){
  //   echo $row['SponsorID'];
  //   echo $row['SponsorName'];
  //   echo $row['CreatedAt'];
  // }

?>