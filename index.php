<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<div id="result"></div>
<script language="Javascript">

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(position) {
        getIRailRoute(position.coords.latitude, position.coords.longitude);
  });
}
else {
  if (document.getElementById("GeoAPI")) {
    document.getElementById("GeoAPI").innerHTML = "I'm sorry but geolocation services are not supported by your browser";
    document.getElementById("GeoAPI").style.color = "#FF0000";
  }
}

function getIRailRoute(mylat, mylong) {

        $('#result').load('data.php?x=' + mylong + '&y=' + mylat, function() {


        });

}

</script>

</head>
<body>
</body>
</html>

