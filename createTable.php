<?php
  require './connect.php';

  function createUserTable($db){
    $userTable = "CREATE TABLE `User`(
      UserID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
      Fname VARCHAR(16) NOT NULL,
      Lname VARCHAR(16),
      Email VARCHAR(16) NOT NULL UNIQUE,
      Pw VARCHAR(32) NOT NULL,
      Phone VARCHAR(16) NOT NULL,
      CreatedAt DATE DEFAULT CURRENT_TIMESTAMP
      )";
  
    if ($db->query($userTable)) {
      echo "Table User created successfully";
    } else {
      echo "Error creating table: " . $db->error;
    }
  }

  // TODO: Check if creating these tables work
  function createHostTable($db){
    $hostTable = "CREATE TABLE `University`(
      UniversityID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
      UniversityName VARCHAR(16) NOT NULL,
      CreatedAt DATE DEFAULT CURRENT_TIMESTAMP,
      HostAdress INT
      )";

      if ($db->query($hostTable)) {
        echo "Table University created successfully";
      } else {
        echo "Error creating table: " . $db->error;
      }
  }

  function createPresenterTable($db){
    $presenterTable = "CREATE TABLE `Presenter`(
      PresenterID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
      PresenterName VARCHAR(16) NOT NULL,
      CreatedAt DATE DEFAULT CURRENT_TIMESTAMP
      )";

    if ($db->query($presenterTable)) {
      echo "Table Presenter created successfully";
    } else {
      echo "Error creating table: " . $db->error;
    }
  }

  function createKeynoteTable($db){
    $speakerTable = "CREATE TABLE `Keynote_Speaker`(
      SpeakerID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
      SpeakerName VARCHAR(16) NOT NULL,
      CreatedAt DATE DEFAULT CURRENT_TIMESTAMP
      )";

    if ($db->query($speakerTable)) {
      echo "Table Keynote_Speaker created successfully";
    } else {
      echo "Error creating table: " . $db->error;
    }
  }

  function createSponsorTable($db){
    $sponsorTable = "CREATE TABLE `Sponsor`(
      SponsorID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
      SponsorName VARCHAR(16) NOT NULL,
      CreatedAt DATE DEFAULT CURRENT_TIMESTAMP
      )";

    if ($db->query($sponsorTable)) {
      echo "Table Sponsor created successfully";
    } else {
      echo "Error creating table: " . $db->error;
    }
  }

  function createEventTypeTable($db){
    $eventType = "CREATE TABLE `EventType`(
      EventTypeID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
      TypeName VARCHAR(16) NOT NULL,
      CreatedAt DATE DEFAULT CURRENT_TIMESTAMP
      )";

    if ($db->query($eventType)) {
      echo "Table EventType created successfully";
    } else {
      echo "Error creating table: " . $db->error;
    }
  }

  function createEventTable($db){
    $$eventTable = "CREATE TABLE `Events`(
      EventID INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
      EventName VARCHAR(16) NOT NULL,
      Descript VARCHAR(64),
      Oraganizer INT, 
      MaxCap INT,
      StartTime DATE,
      EndTime DATE,
      Deadline DATE,
      Published DATE,
      HostedBy INT,
      EventType INT,
      Presenter INT,
      Speaker INT,
      EventStatus INT,
      CreatedAt DATE DEFAULT CURRENT_TIMESTAMP,
      FOREIGN KEY (Organizer) REFERENCES User(UserID),
      FOREIGN KEY (HostedBy) REFERENCES University(UniversityID),
      FOREIGN KEY (EventType) REFERENCES EventType(EventTypeID),
      FOREIGN KEY (Presenter) REFERENCES Presenter(PresenterID),
      FOREIGN KEY (Speaker) REFERENCES Keynote_Speaker(SpeakerID),
      )";
  
    if ($db->query($userTable)) {
      echo "Table Event created successfully";
    } else {
      echo "Error creating table: " . $db->error;
    }
  }

  // M:N tables
  function createTableEventPresenter($db){
    $eventPresenter = "CREATE TABLE `EventPresenter`(
      EventID INT NOT NULL,
      PresenterID INT NOT NULL,
      FOREIGN KEY (EventID) REFERENCES Event(EventID),
      FOREIGN KEY (PresenterID) REFERENCES Presenter(PresenterID),
      )";

    if ($db->query($eventPresenter)) {
      echo "Table EventPresenter created successfully";
    } else {
      echo "Error creating table: " . $db->error;
    }
  }

  function createTableEventKeynote($db){
    $eventSpeaker = "CREATE TABLE `EventKeynote`(
      EventID INT NOT NULL,
      SpeakerID INT NOT NULL,
      FOREIGN KEY (EventID) REFERENCES Event(EventID),
      FOREIGN KEY (SpeakerID) REFERENCES Keynote_Speaker(SpeakerID),
      )";
    
    if ($db->query($eventSpeaker)) {
      echo "Table EventPresenter created successfully";
    } else {
      echo "Error creating table: " . $db->error;
    }
  }

  function createTableEventSponsor($db){
    $eventSponsor = "CREATE TABLE `EventSponsor`(
      EventID INT NOT NULL,
      SponsorID INT NOT NULL,
      FOREIGN KEY (EventID) REFERENCES Event(EventID),
      FOREIGN KEY (SponsorID) REFERENCES Sponsor(SponsorID),
      )";

    if ($db->query($eventSponsor)) {
      echo "Table EventSponsor created successfully";
    } else {
      echo "Error creating table: " . $db->error;
    }
  }

  // create address table


  
  createUserTable($db);
  createHostTable($db);
  createPresenterTable($db);
  createKeynoteTable($db);
  createSponsorTable($db);
  createEventTypeTable($db);
  createEventTable($db);


?>