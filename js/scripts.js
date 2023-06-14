

/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});



function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition,handle_error);
  } else { 
    alert('Geolocation is not supported by this browser.');
  }
}

function showPosition(position) {
  document.getElementById('latitude').value = position.coords.latitude; 
   document.getElementById('longitude').value = position.coords.longitude;
}

function postPosition(){
	console.log(position.coords.latitude);
}


function handle_error(err){
 if(err.code == 1)
 {
     alert('Location Permission denied');
   //User denied permission
 }
 else if(err.code == 2)
 {
     alert('Location Unavailable.');
   //position unavailable
 }
 else if(err.code == 3)
 {
     alert('Location Connection timeout');
   //Timeout
 }
 else{
     alert('Location Error');
   //Some other error
 }
}
getLocation();
