document.addEventListener('DOMContentLoaded', function() {
  console.log('loaded');
  console.log(sessionStorage);
  document.getElementById("home-name").innerHTML = "Welcome " + sessionStorage.getItem("name") + "!";
  document.getElementById('organizer').value = sessionStorage.getItem('id');
  // document.getElementById('del').value = sessionStorage.getItem('id');
  getAttends();
  getEvents();
  getSponsors();
  getKeynote();
  getHost();
  getPresenter();
});

document.getElementById('create').addEventListener('click', ()=>{
  hideAll();
  let eForm = document.getElementById('create-event');
  let computedStyle = window.getComputedStyle(eForm);

  if (computedStyle.display === 'none') {
    eForm.style.display = 'flex';
  } else {
    eForm.style.display = 'none';
  }
})

document.getElementById('manage').addEventListener('click', ()=>{
  hideAll();
  let eForm = document.getElementById('manage-event');
  let computedStyle = window.getComputedStyle(eForm);

  if (computedStyle.display === 'none') {
    eForm.style.display = 'block';
  } else {
    eForm.style.display = 'none';
  }
})

document.getElementById('attend').addEventListener('click', ()=>{
  hideAll();
  activeEvents();
  let eForm = document.getElementById('attend-event');
  let computedStyle = window.getComputedStyle(eForm);

  if (computedStyle.display === 'none') {
    eForm.style.display = 'flex';
  } else {
    eForm.style.display = 'none';
  }
})
