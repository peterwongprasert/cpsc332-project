<? session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Home Page</title>
</head>
<body>
  <div class="home-container">
    <h3 id="home-name"></h3>
    <div class="container flex-row">
      <button class="main-btn btn btn-warning btn-lg" id='manage'>Manage</button>
      <button class="main-btn btn btn-primary btn-lg" id='create'>Create</button>
      <button class="main-btn btn btn-success btn-lg">Attend</button>
    </div>
    <div id='create-event'>
      <h4>Create event</h4>
      <!-- TODO: Finish post page -->
      <form action="submitEvent.php" method="post">
        <label for="event_name">Event Name:</label>
        <input type="text" id="event_name" name="event_name" required><br>
    
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>
    
        <label for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity" required><br>
    
        <!-- <label for="venue">Venue:</label>
        <select>
          <option>-- Select --</option>
        </select>
        <br> -->
    
        <label for="start_time">Start Time:</label>
        <input type="datetime-local" id="start_time" name="start_time" required><br>
    
        <label for="end_time">End Time:</label>
        <input type="datetime-local" id="end_time" name="end_time" required><br>
    
        <label for="deadline">Deadline:</label>
        <input type="date" id="deadline" name="deadline" required><br>
    
        <label for="event_type">Event Type:</label>
        <select id="event_type" name="event_type" required>
            <option value="1">Keynote</option>
            <option value="2">Presentation</option>
        </select><br>
    
        <label for="sponsor">Sponsor:</label>
        <select id="sponsors" name="sponsor">
          <option>-- None --</option>
        </select><br>
    
        <label for="presenter">Presenter:</label>
        <select id='presenter' name="presenter">
          <option>-- None --</option>
        </select><br>
    
        <label for="keynote-speaker">Keynote Speaker:</label>
        <select id="keynote-speaker" name="speaker">
          <option>-- None --</option>
        </select><br>
    
        <label for="host">Host:</label>
        <select id="host" name="host">
          <option>-- None --</option>
        </select><br>
    
        <input id='organizer' name='organizer' hidden>
        <button type="submit">Submit</button>
    </form>
    </div>
    <div id='manage-event'>
      <h4>Manage Events</h4>
      <div class='events'>
        <ol type='1'>
          <li>
            <label>Event Name</label>
            <label>Start Time</label>
            <button class="main-btn btn btn-danger del-butt" id='del'>Del</button>
          </li>
        </ol>
      </div>
    </div>
  </div>
</body>
<script src="./script.js"></script>
<script src="./driver.js"></script>
</html>