<?php 
     session_start();
     include("../../dbclasses/db_shop.php");
      $shop = new Shop();
	  $platitude=$_REQUEST['latitude'];
	  $plongitude=$_REQUEST['longitude'];
	  $shop_id=$_REQUEST['shop_id'];
	 
      if(isset($_REQUEST['save'])) {
	
	   $shop->setmap_latitude($_REQUEST['latitude']);
	   $shop->setmap_longitude($_REQUEST['longitude']);
	   $shop->updatelocation($shop_id);
	   
	  header('location:shop.php');
	  }
	    
	  ?>



<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.04022.js"></script>
	
	<style>
#myMap {
	
	align:center;
   height: 500px;
   width: 100%;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZ7QPygKs8ozc2lIEkGDsb3gjpk6Mgbwk&libraries=places&sensor=false">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script type="text/javascript"> 
var platitude="<?php echo $platitude; ?>";
var plongitude="<?php echo $plongitude; ?>";
var map;
var marker;
var myLatlng = new google.maps.LatLng(platitude,plongitude);
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
function initialize(){
var mapOptions = {
zoom: 17,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
};

map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

marker = new google.maps.Marker({
map: map,
position: myLatlng,
draggable: true 
}); 

geocoder.geocode({'latLng': myLatlng }, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('#latitude,#longitude').show();
$('#address').val(results[0].formatted_address);
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
}
}
});

google.maps.event.addListener(marker, 'dragend', function() {

geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('#address').val(results[0].formatted_address);
$('#latitude').val(marker.getPosition().lat());
$('#longitude').val(marker.getPosition().lng());
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
var lat = document.getElementById("latitude").value
var lng =  document.getElementById("longitude").value
}
}
});
});

}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
 
</head>
<body>
<form method="POST"  >
<div id="myMap"></div>
<input id="address" class="form form-control" type="text" style="width:800px; align:right;"/>
<input type="text"   id="latitude" name="latitude" placeholder="Latitude"/>
<input type="text"  id="longitude" name="longitude" placeholder="Longitude"/>
<input type="submit" name="save" class="btn btn-primary"  value="save">
</form>

<?php include('../includes/side_menu_shop.php'); ?>

</body>
</html>
