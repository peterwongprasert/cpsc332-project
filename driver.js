document.addEventListener('DOMContentLoaded', function() {
  console.log('loaded');
  console.log(sessionStorage);
  document.getElementById("home-name").innerHTML = "Welcome " + sessionStorage.getItem("name") + "!";
  document.getElementById('organizer').value = sessionStorage.getItem('id');
  getSponsors();
  getKeynote();
  getHost();
  getPresenter();
});

document.getElementById('create').addEventListener('click', ()=>{
  var eForm = document.getElementById('create-event');
  var computedStyle = window.getComputedStyle(eForm);

  if (computedStyle.display === 'none') {
    eForm.style.display = 'block';
  } else {
    eForm.style.display = 'none';
  }
})