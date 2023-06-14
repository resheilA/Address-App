
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  }
}

function showPosition(position) {
  document.getElementById("latitude").value = position.coords.latitude;
  document.getElementById("longitude").value = position.coords.longitude;
}

function getcurrentlocation(){
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(postPosition);
  }
}

function postPosition(){
	console.log(position.coords.latitude);
}