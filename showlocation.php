<?php 

     include("dbclasses/db_shop.php");
      $shop = new Shop();
	  
	  $shop_id=$_REQUEST['shop_id'];
      $shop->selectShopname($_REQUEST['shop_id']);
	  $shop_name=$_REQUEST['shop_name'];
      $latitutde1 = $shop->map_latitude;
      $longitude1 = $shop->map_longitude;
	  $x=$shop->map_latitude;
	  $y=$shop->map_longitude;
	  ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
	<script src="js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>

<!-- //animation-effect -->
</head>
	
<body>
<!-- header -->
<?php include('header.php'); 
?>

<!-- //header -->
	<style>
#myMap {
   height: 350px;
   width: 100%;
}
</style>
<style>

.clickme {
    background-color: #EEEEEE;
    padding: 8px 20px;
    text-decoration:none;
    font-weight:bold;
    border-radius:5px;
    color: #10a2ff;
    cursor:pointer;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZ7QPygKs8ozc2lIEkGDsb3gjpk6Mgbwk&libraries=places&sensor=false">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script type="text/javascript"> 
var platitude="<?php echo $latitutde1; ?>";
var plongitude="<?php echo $longitude1; ?>";
var map;
var marker;
var myLatlng = new google.maps.LatLng(platitude,plongitude);
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
function initialize(){
var mapOptions = {
zoom: 18,
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


<input id="shop_name" value="<?php echo $shop_name ?> "type="text" style="color:blue;width:800px; border:none"/><br>
<input id="address" type="text" style="color:blue;width:800px; border:none"/><br/><br/>
 <a href="http://maps.google.co.in/maps?q=<?php echo $x; ?>,<?php echo $y; ?>" class="clickme danger">Click here to get direction</a> 
<div id="myMap"></div>
</body>
<?php include('footer.php'); ?>
</html>
