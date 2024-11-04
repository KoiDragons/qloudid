// [START maps_event_click_latlng]
function initMap() {
 
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: myLatlng,
  });
  // Create the initial InfoWindow.
  let infoWindow = new google.maps.InfoWindow({
    content: "Click the map to get Lat/Lng!",
    position: myLatlng,
  });
  infoWindow.open(map);
  // [START maps_event_click_latlng_listener]
  // Configure the click listener.
  map.addListener("click", (mapsMouseEvent) => {
    // Close the current InfoWindow.
    infoWindow.close();
	var send_data={};
				 send_data.updateInfo=JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
				 
				 $.ajax({
							type:"POST",
							url:"../updateAddressCoordinates/"+updateID,
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
							  
							}
						});	
    // Create a new InfoWindow.
    infoWindow = new google.maps.InfoWindow({
		
      position: mapsMouseEvent.latLng,
    });
	 
    infoWindow.setContent(
      JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
	  
	 
    );
	
    infoWindow.open(map);
  });
   
  // [END maps_event_click_latlng_listener]
}