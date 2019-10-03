<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

<form action="setLocationSession.php" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <div id="locationField">
                    <input id="autocomplete"
                           placeholder="Enter your Location"
                           onFocus="geolocate()"
                           type="text" class="form-control"/>
                </div>
            </div>
            <div class="col-sm-3">
                <input type="hidden" id="latitude" name="latitude"/>
                <input type="hidden" id="longitude" name="longitude"/>
                
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <table id="address">
    <tr>
        <td class="wideField" colspan="2">

        </td>
    </tr>
    <tr>
        <input type="submit" class="btn btn-primary btn-xs" value="Set Location" />
    </tr>
</table>
</form>
<script>
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };
    function initAutocomplete() {
        // Create the autocomplete object, restricting the search predictions to
        // geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('autocomplete'), {types: ['geocode']});
        // Avoid paying for data that you don't need by restricting the set of
        // place fields that are returned to just the address components.
        autocomplete.setFields(['address_component']);
    }
    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                document.getElementById('latitude').value  = position.coords.latitude;
                document.getElementById('longitude').value = position.coords.longitude;
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle(
                    {center: geolocation, radius: position.coords.accuracy});
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwrUohup0lgUJbJ9qJ7Kw2q4msyfzW_aA&libraries=places&callback=initAutocomplete"
        async defer></script>
</body>
</html>
