<?php 
$servername = "localhost";
$username = "student_11903162";
$password = "ynLTL67hsDHm";
$dbname = "student_11903162";
$conn = new mysqli($servername, $username, $password, $dbname);// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$IDfilter=1;
$sql="SELECT * FROM DataTabel WHERE ID = '".$IDfilter."'";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result)) {
	$dataPoints=array(array("x"=>$row['Tijd'],"y"=>$row['Waarde']));
   	
}

mysqli_close($conn);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "jQuery Grafiek"
	},
	axisY: {
		title: "Waarde",
		valueFormatString: "#0,,.",
		suffix: "°C"
	
	},
	data: [{
		type: "spline",
		markerSize: 5,
		xValueFormatString: "YYYY",
		yValueFormatString: "$#,##0.##",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
 
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html> 