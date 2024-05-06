document.addEventListener('DOMContentLoaded', function() {
  console.log('loaded');
  console.log(sessionStorage);
  document.getElementById("home-name").innerHTML = "Welcome " + sessionStorage.getItem("name") + "!";
  getSponsors();
});

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
              option.value = s.SponsorId;
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
            
            const sponsors = JSON.parse(xhr.responseText);
            node = document.getElementById('sponsors');
 
            // create options using data we retrieved
            sponsors.forEach((s) => {
              const option = document.createElement('option');
              option.value = s.SponsorId;
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
            
            const sponsors = JSON.parse(xhr.responseText);
            node = document.getElementById('sponsors');
 
            // create options using data we retrieved
            sponsors.forEach((s) => {
              const option = document.createElement('option');
              option.value = s.SponsorId;
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
            
            const sponsors = JSON.parse(xhr.responseText);
            node = document.getElementById('sponsors');
 
            // create options using data we retrieved
            sponsors.forEach((s) => {
              const option = document.createElement('option');
              option.value = s.SponsorId;
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