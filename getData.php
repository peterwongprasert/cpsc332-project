<?php 
  session_start();

  if(isset($_SESSION['id'])){
    //kick user out
  }
  require './connect.php';
  
  // if we pass gs into the URL
  if(isset($_GET['gs'])){
    $sponsors = [];
    
    $sql = 'SELECT SponsorID, SponsorName 
      FROM `Sponsor` 
      ORDER BY SponsorName ASC';

    $result = $db->query($sql);
    
    while($row = $result->fetch_assoc()){
      $sponsors[] = $row;
    }
    $result->free();

    echo json_encode($sponsors);
  }

  //TODO: GET host ['gh'], keynote ['gk'], presenter ['gs']
?>