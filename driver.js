document.addEventListener('DOMContentLoaded', function() {
  console.log('loaded');
  console.log(sessionStorage);
  document.getElementById("home-name").innerHTML = "Welcome " + sessionStorage.getItem("name") + "!";
  getSponsors();
});

