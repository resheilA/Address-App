<?php 
if(!isset($_GET["clLAT"]))
{
$_GET["clLAT"] = "";
}

if(!isset($_GET["clLONG"]))
{
$_GET["clLONG"] = "";
}

if(!isset($_GET["riLAT"]))
{
$_GET["riLAT"] = "";
}

if(!isset($_GET["riLONG"]))
{
$_GET["riLONG"] = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Custom Icons Tutorial - Leaflet</title>
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
	
	<link href="https://cdn.materialdesignicons.com/1.3.41/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript" src="Leaflet.Icon.Glyph.js"></script>
	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 90%;
			width: 90%;
			max-width: 100%;
			max-height: 100%;
		}
	</style>

	
</head>
<body>

<div id='map'></div>

<script>
	const map = L.map('map').setView([<?php echo $_GET["clLAT"]; ?>, <?php echo $_GET["clLONG"]; ?>], 13);

	L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	const LeafIcon = L.Icon.extend({
		options: {
			iconSize:     [38, 95],
			shadowSize:   [50, 64],
			iconAnchor:   [22, 94],
			shadowAnchor: [4, 62],
			popupAnchor:  [-3, -76]
		}
	});

	const greenIcon = new LeafIcon({iconUrl: 'home.png'});
	const redIcon = new LeafIcon({iconUrl: 'motorcycleog.png'});
	const orangeIcon = new LeafIcon({iconUrl: 'leaf-orange.png'});

	L.marker([<?php echo $_GET["riLAT"]; ?>, <?php echo $_GET["riLONG"]; ?>], {icon:L.icon.glyph({ prefix: 'mdi', glyph: 'bike' }) }).bindPopup('Rider Location.').addTo(map);
	
	L.marker([<?php echo $_GET["clLAT"]; ?>,<?php echo $_GET["clLONG"]; ?>], {icon:L.icon.glyph({ prefix: 'mdi', glyph: 'home' }) }).bindPopup('Client Location.').addTo(map);

	//const mGreen = L.marker([<?php echo $_GET["clLAT"]; ?>, <?php echo $_GET["clLONG"]; ?>], {icon: greenIcon}).bindPopup('I am a green leaf.').addTo(map);
	//const mRed = L.marker([<?php echo $_GET["riLAT"]; ?>, <?php echo $_GET["riLONG"]; ?>], {icon: redIcon}).bindPopup('I am a red leaf.').addTo(map);
	
	
</script>



</body>
</html>
