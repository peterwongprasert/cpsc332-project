document.addEventListener('DOMContentLoaded', function() {
  callFunctions();

  
  
});

function callFunctions(){
  getSponsors();
  getKeynote();
  getHost();
  getPresenter();

  const url = window.location.search;
  const urlParams = new URLSearchParams(url);
  console.log(urlParams.get('eid'));
  getEventDetails(urlParams.get("eid"));
}