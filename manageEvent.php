<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form>
    <h4 id='event-name'></h4>
    <div>
      <label for="description">Description:</label>
      <textarea id='description'></textarea>
    </div>
    <div>
      <label for="max-cap">Capacity:</label>
      <input id='max-cap'>
    </div>
    <div>
      <label for="start-time">Start Time:</label>
      <input type='datetime-local' id='start-time'>
    </div>
    <div>
      <label for="end-time">End Time:</label>
      <input type='datetime-local' id='end-time'>
    </div>
    <div>
      <label for="deadline">Deadline:</label>
      <input type='datetime-local' id='deadline'>
    </div>
    <div>
      <label for="isPublished">Publish:</label>
      <input type='checkbox' id='isPublished'>
    </div>
    <div>
      <label for="event-type">Event Type:</label>
      <select id="event-type" name="event-type" required>
          <option value="1">Poster</option>
          <option value="2">Presentation</option>
          <option value="3">Online</option>
      </select>
    </div>
    <div>
      <label for="sponsor">Sponsor:</label>
      <select id="sponsors" name="sponsor">
        <option>-- None --</option>
      </select>
    </div>
    <div>
      <label for="presenter">Presenter:</label>
      <select id='presenter' name="presenter">
        <option>-- None --</option>
      </select>
    </div>
    <div>
      <label for="keynote-speaker">Keynote Speaker:</label>
      <select id="keynote-speaker" name="speaker">
        <option>-- None --</option>
      </select>
    </div>
    <div>
      <label for="host">Host:</label>
      <select id="host" name="host">
        <option>-- None --</option>
      </select>
    </div>    
  </form>
</body>

<script src='./script.js'></script>
<script src='./manageEventDriver.js'></script>
</html>