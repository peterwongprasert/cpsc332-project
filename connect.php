<?php

  $user = "root";
  $pw = "";
  $dbName = "test";

  $db = new mysqli("localhost", $user, $pw, $dbName);

  if ($db->connect_errno) {
    die("Failed to connect to MySQL: " . $db->connect_error);
  }

  echo "connected";

?>