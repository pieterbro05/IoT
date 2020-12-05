<?php 
$servername = "localhost";
$username = "student_11903162";
$password = "ynLTL67hsDHm";
$dbname = "student_11903162";
$conn = new mysqli($servername, $username, $password, $dbname);// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM DataTabel WHERE ID = 1";
$result = mysqli_query($conn,$sql);

$dataPoints=array();
while($row = mysqli_fetch_array($result)) {
	$Time=strtotime($row['Tijd'])*1000;
	$dataPoints[]=array("x"=>$Time,"y"=>$row['Waarde']);
   	
}
$sql="SELECT * FROM DataTabel WHERE ID = 2";
$result = mysqli_query($conn,$sql);

$dataPoints2=array();
while($row = mysqli_fetch_array($result)) {
	$Time=strtotime($row['Tijd'])*1000;
	$dataPoints2[]=array("x"=>$Time,"y"=>$row['Waarde']);
   	
}


mysqli_close($conn);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var options = {
	animationEnabled: true,
	exportEnabled: true,
	zoomEnabled: true,
	title:{
		text: "jQuery Grafiek"
	},
	axisY: {
		title: "Waarde",
		valueFormatString: "#,##0.##",
		suffix: ""
	
	},
	axisX:{
		title: "Tijd"
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "spline",
		name: "Temperatuur",
		markerSize: 1,
		xValueFormatString: "YYYY",
		yValueFormatString: "#,##0.##°C",
		xValueType: "dateTime",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	},{
		type: "spline",
		name: "Licht",
		markerSize: 1,
		xValueFormatString: "YYYY",
		yValueFormatString: "#,##0.##lm",
		xValueType: "dateTime",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
};
 
$("#chartContainer").CanvasJSChart(options);

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html> 
 
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html> 
