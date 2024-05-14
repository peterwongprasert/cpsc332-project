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

  if(isset($_GET['gk'])){
    $keynote = [];
    
    $sql = 'SELECT SpeakerID, SpeakerName 
      FROM `Keynote_Speaker` 
      ORDER BY SpeakerName ASC';

    $result = $db->query($sql);
    
    while($row = $result->fetch_assoc()){
      $keynote[] = $row;
    }
    $result->free();

    echo json_encode($keynote);
  }

  if(isset($_GET['gh'])){
    $host = [];
    
    $sql = 'SELECT UniversityID, UniversityName 
      FROM `University` 
      ORDER BY UniversityName ASC';

    $result = $db->query($sql);
    
    while($row = $result->fetch_assoc()){
      $host[] = $row;
    }
    $result->free();

    echo json_encode($host);
  }

  if(isset($_GET['gp'])){
    $presenter = [];
    
    $sql = 'SELECT PresenterID, PresenterName 
      FROM `Presenter` 
      ORDER BY PresenterName ASC';

    $result = $db->query($sql);
    
    while($row = $result->fetch_assoc()){
      $presenter[] = $row;
    }
    $result->free();

    echo json_encode($presenter);
  }

  if(isset($_GET['ge'])){
    $events = [];
    $id = $_GET['ge'];
    
    $sql = "SELECT e.EventID, e.EventName, e.StartTime 
    FROM `Event` e
    JOIN `University` u ON e.HostedBy = u.UniversityID
    WHERE Organizer = $id
    ORDER BY e.StartTime ASC";

    $result = $db->query($sql);
    
    while($row = $result->fetch_assoc()){
      $events[] = $row;
    }
    $result->free();

    echo json_encode($events);
  }

  if(isset($_GET['attending'])){
    $a = $_GET['attending'];
    $attending = [];

    $sql = "SELECT * FROM `Attends` a
    JOIN `Event` e ON e.EventID = a.EventID
    JOIN `University` u ON u.UniversityID = e.HostedBy
    WHERE AttendeeID = $a";

    $result = $db->query($sql);

    while($row = $result->fetch_assoc()){
      $attending[] = $row;
    }

    $result->free();

    echo json_encode($attending);
  }

  if(isset($_GET['ga'])){
    $events = [];

    // select all the events that are
    // active
    // not passed
    // under capacity
    // published
    // we also need to join with the attends table
    $sql = "SELECT e.*, u.*, COUNT(a.AttendeeID) AS AttendeeCount
    FROM `Event` e
    JOIN `University` u ON  e.HostedBy = u.UniversityID
    LEFT JOIN `Attends` a ON e.EventID = a.EventID
    WHERE `StartTime` > DATE_SUB(CURDATE(), INTERVAL 1 DAY)
    GROUP BY e.EventID";

    $result = $db->query($sql);

    while($row = $result->fetch_assoc()){
      $events[] = $row;
    }

    $result->free();

    echo json_encode($events);
  }
?>