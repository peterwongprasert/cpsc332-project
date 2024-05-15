document.addEventListener('DOMContentLoaded', function() {
  const url = window.location.search;
  const urlParams = new URLSearchParams(url);
  console.log(urlParams.get('eid'));

  document.getElementById('eid').value = urlParams.get("eid");

  callFunctions(urlParams.get("eid"));

  
  
});

function callFunctions(eid){
  getSponsors();
  getKeynote();
  getHost();
  getPresenter();

  
  getEventDetails(eid);
}