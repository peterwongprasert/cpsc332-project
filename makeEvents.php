<?php 

require './connect.php';

$sql = "INSERT INTO `Event`(
    EventName, 
    Descript, 
    Organizer, 
    MaxCap, 
    StartTime, 
    EndTime, 
    Deadline, 
    isPublished, 
    HostedBy, 
    EventType, 
    Presenter, 
    Speaker, 
    EventStatus) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $db->prepare($sql);

$name = 'name';
$descript = 'lorum ipsum';
$organizer = 6;
$cap = 99;
$start = '2024-05-26 17:51:10';
$end = '2024-05-28 17:51:10';
$deadline = '2024-05-26';
$host = 1;
$type = 3;
$presenter = 1;

$stmt->bind_param('ssiisssiiiii', 
    $name,
    $descript,
    $organizer,
    $cap,
    $start,
    $end,
    $deadline,
    // Omitting isPublished from bind_param assuming it has a default value
    $host,
    $type,
    $presenter,
    1 // Assuming EventStatus has a default value or is automatically populated
);

$stmt->execute();

?>
