<?php

  $sql = "CREATE VIEW `MoreThanTen` AS
    SELECT Fname, Lname, Email, Phone, COUNT(Organizer) AS Organized
    FROM `User` u
    JOIN `Event` e ON u.UserID = e.Organizer
    GROUP BY u.UserID
    HAVING Organized > 9";

// try {
//   $stmt = $db->prepare($sql);

//   if ($stmt === false) {
//       throw new Exception("Error in preparing statement: " . $db->error);
//   }

//   if ($stmt->execute() === false) {
//       throw new Exception("Error in executing statement: " . $stmt->error);
//   }

//   echo "View 'MoreThanTen' created successfully!";
// } catch (Exception $e) {
//   echo "Error: " . $e->getMessage();
// }

mysqli_query($db, $sql);

$sql = "CREATE VIEW `MoreThanHundred` AS 
SELECT e.EventID, e.EventName, COUNT(AttendeeID) AS Attending 
FROM `Event` e
JOIN `Attends` a ON e.EventID = a.EventID
GROUP BY e.EventID
HAVING Attending > 99";
mysqli_query($db, $sql);

$sql = "CREATE VIEW `ClosedOrCancelled` AS 
SELECT e.EventID, e.EventName, e.EndTime, e.EventStatus
FROM `Event` e
WHERE e.EventStatus = 3 OR e.EndTime < CURRENT_DATE();";
mysqli_query($db, $sql);

?>

