function script(){
  console.log('script');
}

const id = sessionStorage.getItem('id');

function signIn(e) {
  e.preventDefault();

  // Get form data
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Configure the request
  xhr.open("POST", "signin.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Set up the callback function
  xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {

              // handle response here
              if(xhr.responseText){
                response = JSON.parse(xhr.responseText)
                sessionStorage.setItem("id", response['id']);
                sessionStorage.setItem("name", response['name']);
                window.location.href = "./home.php";
              } else{
                document.getElementById('incorrect').style.display = 'block';
              }
          } else {
              console.log("Error: " + xhr.status);
          }
      }
  };

  // Prepare the request data
  var formData = "username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password);

  // Send the request
  xhr.send(formData);
}

// ============== HOMEPAGE FUNCTIONS ==============================
function getSponsors(){

  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Configure the request
  xhr.open("GET", "getData.php?gs", true);

  // Set up the callback function
  xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // callback successful
            
            const sponsors = JSON.parse(xhr.responseText);
            node = document.getElementById('sponsors');
 
            // create options using data we retrieved
            sponsors.forEach((s) => {
              const option = document.createElement('option');
              option.value = s.SponsorID;
              option.textContent = s.SponsorName;
              node.appendChild(option);
            })
            
          } else {
              console.log("Error: " + xhr.status);
          }
      }
  };

  // Send the request
  xhr.send();
}

function getKeynote(){

  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Configure the request
  xhr.open("GET", "getData.php?gk", true);

  // Set up the callback function
  xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // callback successful
            
            const speaker = JSON.parse(xhr.responseText);
            node = document.getElementById('keynote-speaker');
 
            // create options using data we retrieved
            speaker.forEach((s) => {
              const option = document.createElement('option');
              option.value = s.SpeakerID;
              option.textContent = s.SpeakerName;
              node.appendChild(option);
            })
            
          } else {
              console.log("Error: " + xhr.status);
          }
      }
  };

  // Send the request
  xhr.send();
}

function getHost(){

  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Configure the request
  xhr.open("GET", "getData.php?gh", true);

  // Set up the callback function
  xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // callback successful
            
            const host = JSON.parse(xhr.responseText);
            node = document.getElementById('host');
 
            // create options using data we retrieved
            host.forEach((s) => {
              const option = document.createElement('option');
              option.value = s.UniversityID;
              option.textContent = s.UniversityName;
              node.appendChild(option);
            })
            
          } else {
              console.log("Error: " + xhr.status);
          }
      }
  };

  // Send the request
  xhr.send();
}

function getPresenter(){

  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Configure the request
  xhr.open("GET", "getData.php?gp", true);

  // Set up the callback function
  xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // callback successful
            
            const presenter = JSON.parse(xhr.responseText);
            node = document.getElementById('presenter');
 
            // create options using data we retrieved
            presenter.forEach((s) => {
              const option = document.createElement('option');
              option.value = s.PresenterID;
              option.textContent = s.PresenterName;
              node.appendChild(option);
            })
            
          } else {
              console.log("Error: " + xhr.status);
          }
      }
  };

  // Send the request
  xhr.send();
}

// USER EVENTS ATTENDING ==============================
function getAttends(){
  var xhr = new XMLHttpRequest();

  xhr.open('GET', "getData.php?attending=" + sessionStorage.getItem('id'), true);
  // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
  xhr.onreadystatechange = function(){
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        console.log(xhr.responseText);
        let listTop = document.getElementById('attending');

        // Assuming xhr.responseText contains the JSON array
        var response = JSON.parse(xhr.responseText);

        // Iterate over the JSON array and create list items
        let count = 1;
        response.forEach(function(e) {
        
          let containerDiv = document.createElement('div');
          // containerDiv.classList.add('event-container');
          // containerDiv.classList.add('container');
          containerDiv.classList.add('flex-row')

          let event = document.createElement('label');
          event.classList.add('col-2')
          event.textContent = e.EventName;

          let des = document.createElement('p');
          des.classList.add('col-4')
          des.textContent = e.Descript;

          let mDate = moment(e.StartTime);
          let time = document.createElement('label');
          time.textContent = mDate.format('MM-DD-YYYY h:m A');

          let venue = document.createElement('label')
          venue.textContent = e.UniversityName
          e.EventType === "3" ? venue.textContent += " (Online)" : '';

          let deleteButton = document.createElement('button');
          deleteButton.textContent = 'Del';
          deleteButton.classList.add('btn');
          deleteButton.classList.add('btn-danger');
          deleteButton.classList.add('btn-sm');
          deleteButton.setAttribute('onclick', 'unAttend('+e.EventID+')');


          containerDiv.appendChild(event);
          containerDiv.appendChild(des);
          containerDiv.appendChild(time);
          containerDiv.appendChild(venue);
          containerDiv.appendChild(deleteButton);

          listTop.appendChild(containerDiv);
        });


      }else {
        console.log("Error: " + xhr.status);
      }
    }
  };

  xhr.send();
}

function getEvents(){

  var xhr = new XMLHttpRequest();

  xhr.open('GET', "getData.php?ge=" + sessionStorage.getItem('id'), true);

  xhr.onreadystatechange = function(){
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        console.log(xhr.responseText);

        // Assuming xhr.responseText contains the JSON array
        var response = JSON.parse(xhr.responseText);
        var eventsList = document.querySelector('.events ol');

        // Clear existing list items
        eventsList.innerHTML = '';

        // Iterate over the JSON array and create list items
        let count = 1;
        response.forEach(function(event) {
        
          var listItem = document.createElement('li');

          var listNo = document.createElement('label');
          listNo.textContent = count;
          
          var eventNameLabel = document.createElement('label');
          eventNameLabel.textContent = event.EventName;
          
          var startTimeLabel = document.createElement('label');
          startTimeLabel.textContent = event.StartTime;
          
          var deleteButton = document.createElement('button');
          deleteButton.textContent = 'Del';
          deleteButton.classList.add('main-btn', 'btn', 'btn-danger');
          deleteButton.setAttribute('onclick', 'deleteEvent('+event.EventID+')');
          
          // Add event listener to delete button if needed
          listItem.appendChild(listNo);
          listItem.appendChild(eventNameLabel);
          listItem.appendChild(startTimeLabel);
          listItem.appendChild(deleteButton);
          
          eventsList.appendChild(listItem);
          count++;
        });


      }else {
        console.log("Error: " + xhr.status);
      }
    }
  };

  xhr.send();
}

function deleteEvent(id){
  console.log('del ' + id);

  var xhr = new XMLHttpRequest();

  xhr.open('POST', 'submitEvent.php?d='+id, true)
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // console.log(xhr.status);
          // console.log(xhr.responseText);
          getEvents();
          
        } else {
            console.log("Error: " + xhr.status);
        }
    }
};

  xhr.send();
}

function joinEvent(eventID){
  console.log('joinEvent', eventID);
  let id = sessionStorage.getItem('id');
  var xhr = new XMLHttpRequest();

  xhr.open('POST', 'joinEvent.php', true)
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          console.log(xhr.responseText);
          
        } else {
            console.log("Error: " + xhr.status);
        }
    }
};

  const params = 'join=' + encodeURIComponent(eventID) + '&id=' + id;
  xhr.send(params);
}

function unAttend(eventID){
  console.log('del ' + eventID);

  var xhr = new XMLHttpRequest();

  xhr.open('POST', 'joinEvent.php', true)
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          console.log(xhr.responseText);
          
        } else {
            console.log("Error: " + xhr.status);
        }
    }
  };

  const params = 'unjoin=' + encodeURIComponent(eventID) + '&id=' + id;
  xhr.send(params);
}

function activeEvents(q){
  console.log('activeEvents');
  var xhr = new XMLHttpRequest();

  xhr.open('POST', 'getData.php?ga='+q, true)
  xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        console.log(xhr.responseText);
        events = JSON.parse(xhr.responseText);
        console.log(typeof events);
        let openEvents = document.getElementById('open-events')
        events.forEach((event) => {
          console.log(event);
          const eventContainer = document.createElement('div');
          eventContainer.classList.add('event-container');

          let eventName = document.createElement('label');
          eventName.classList.add('col-1')
          eventName.textContent = event.EventName;

          let description = document.createElement('p');
          description.classList.add('col-2')
          description.textContent = event.Descript;

          let eDate = moment(event.StartTime)
          let start = document.createElement('label');
          start.classList.add('col-2')
          start.textContent = eDate.format('MM-DD-YYYY h:m A');

          let cap = document.createElement('label');
          cap.textContent = `${event.AttendeeCount}/${event.MaxCap}`;

          let venue = document.createElement('label');
          venue.classList.add('col-2')
          venue.textContent = event.UniversityName;

          let button = document.createElement('button');
          button.classList.add(`btn`);
          button.classList.add(`btn-success`);
          button.classList.add(`btn-lg`);
          if(event.AttendeeCount >= event.MaxCap){
            button.disabled = true;
          }
          button.addEventListener('click', () => {
            joinEvent(event.EventID)
          });

          eventContainer.appendChild(eventName);
          eventContainer.appendChild(description);
          eventContainer.appendChild(start);
          eventContainer.appendChild(cap);
          eventContainer.appendChild(venue);
          eventContainer.appendChild(button);

          openEvents.appendChild(eventContainer);

        });
      } else {
        console.log("Error: " + xhr.status);
      }
    }
  };

  xhr.send();
}

function hideAll(){
  document.getElementById('create-event').style.display = 'none';
  document.getElementById('manage-event').style.display = 'none';
  document.getElementById('attend-event').style.display = 'none';
}