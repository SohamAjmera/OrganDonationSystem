<?php
// Sample coordinates (can be replaced with data from the DB)
$locations = [
    ['name' => 'Global Hospital', 'lat' => 19.0705, 'lng' => 72.8777],
    ['name' => 'Fortis Mulund', 'lat' => 19.1726, 'lng' => 72.9563],
    ['name' => 'KEM Hospital', 'lat' => 18.9786, 'lng' => 72.8328]
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Organ Donation - Map Locator</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
            border-radius: 8px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
    </style>
</head>
<body>

<h2>Nearby Donor Hospitals</h2>
<div id="map"></div>

<script>
    function initMap() {
        var center = {lat: 19.0760, lng: 72.8777}; // Mumbai center
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: center
        });

        const locations = <?php echo json_encode($locations); ?>;
        locations.forEach(function(loc) {
            new google.maps.Marker({
                position: {lat: loc.lat, lng: loc.lng},
                map: map,
                title: loc.name
            });
        });
    }
</script>

<!-- Replace YOUR_API_KEY with your actual Google Maps API key -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
</script>

</body>
</html>
