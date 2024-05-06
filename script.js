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
