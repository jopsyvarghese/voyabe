<?php 
     session_start();
     include("../../dbclasses/db_shop.php");
      $shop = new Shop();
	  //$platitude=$_REQUEST['latitude'];
	 // $plongitude=$_REQUEST['longitude'];
	  $shop_id=$_REQUEST['shop_id'];
	 
      if(isset($_REQUEST['save'])) {
	
	   $shop->setmap_latitude($_REQUEST['lat']);
	   $shop->setmap_longitude($_REQUEST['lng']);
	   $shop->updatelocation($shop_id);
	   
	  echo "<script language=JavaScript>document.location.href='shops.php' </script>";
	  }
	    
	  ?>



<html>
    
    <link href="css/mapstyle.css" rel="stylesheet" type="text/css">
  <body>
    <div class="pac-card" id="pac-card">
      <div>
        <div id="label">
          Location search
        </div>       
      </div>
      <div id="pac-container">
          <form method="POST"  >
        <input id="pac-input" type="text" placeholder="Enter a location"><div id="location-error"></div>
        <input type="text"   id="lat" name="lat" placeholder="Latitude"/>
        <input type="text"  id="lng" name="lng" placeholder="Longitude"/>
        <input type="submit" name="save" class="btn btn-primary"  value="save">
        </form>
      </div>
    </div>
    <div id="map"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>
    <script>
    function initMap() {
    	var centerCoordinates = new google.maps.LatLng(20.5937, 78.9629);
        var map = new google.maps.Map(document.getElementById('map'), {
        center: centerCoordinates,
        zoom: 4
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
     
        var infowindowContent = document.getElementById('infowindow-content');
        
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);
        var infowindow = new google.maps.InfoWindow();
        infowindow.setContent(infowindowContent);
        
        var marker = new google.maps.Marker({
          map: map
        });

        autocomplete.addListener('place_changed', function() {
 	        document.getElementById("location-error").style.display = 'none';
            infowindow.close();
            marker.setVisible(false);
        		var place = autocomplete.getPlace();
        		if (!place.geometry) {
        		  	document.getElementById("location-error").style.display = 'inline-block';
        		  	document.getElementById("location-error").innerHTML = "Cannot Locate '" + input.value + "' on map";
        		    return;
        		}
        		   document.getElementById('lat').value = place.geometry.location.lat();
                    document.getElementById('lng').value = place.geometry.location.lng();
        		map.fitBounds(place.geometry.viewport);
        		marker.setPosition(place.geometry.location);
        		marker.setVisible(true);
        	    
        		infowindowContent.children['place-icon'].src = place.icon;
        		infowindowContent.children['place-name'].textContent = place.name;
        		infowindowContent.children['place-address'].textContent = input.value;
        		infowindow.open(map, marker);
        });
    }
    

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9rpmPsi1HAq_PEe68ocrne-AWtFxUmjA&libraries=places&callback=initMap"
        async defer></script>
  </body>
</html>