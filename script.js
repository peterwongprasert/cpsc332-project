function script(){
  console.log('script');
}
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

// TODO
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

// TODO
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

// TODO
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