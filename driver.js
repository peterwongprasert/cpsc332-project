window.onload = () => {
  console.log('loaded');
  getSponsors();
}

function getSponsors() {

  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Configure the request
  xhr.open("GET", "getData.php?gs=getSponsors", true);

  // Set up the callback function
  xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            const sponsors = JSON.parse(xhr.responseText);
            console.log(sponsors);
          } else {
              console.log("Error: " + xhr.status);
          }
      }
  };

  // Send the request
  xhr.send();
}