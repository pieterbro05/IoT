<?php 

$servername = "localhost";
$username = "student_11903162";
$password = "ynLTL67hsDHm";
$dbname = "student_11903162";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql= mysqli_query($conn, "SELECT MAX( Waarde ) AS max FROM `DataTabel`WHERE ID =1;" );
$res = mysqli_fetch_array( $sql);
$maximumtemp = $res['max'];
$sql= mysqli_query($conn, "SELECT MIN( Waarde ) AS min FROM `DataTabel` WHERE ID =1;" );
$res = mysqli_fetch_array( $sql);
$minimumtemp = $res['min'];
$sql= mysqli_query($conn, "SELECT AVG(Waarde) AS AveragePrice FROM DataTabel WHERE ID =1;" );
$res = mysqli_fetch_array($sql);
$gemtemp = $res['AveragePrice'];
$sql="SELECT * FROM DataTabel WHERE ID = 1";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
	$lasttemp=$row['Waarde'];	
	$lastTijd1=$row['Tijd'];
}

$sql= mysqli_query($conn, "SELECT MAX( Waarde ) AS max FROM `DataTabel`WHERE ID =2;" );
$res = mysqli_fetch_array( $sql);
$maximumlicht = $res['max'];
$sql= mysqli_query($conn, "SELECT MIN( Waarde ) AS min FROM `DataTabel` WHERE ID =2;" );
$res = mysqli_fetch_array($sql);
$minimumlicht = $res['min'];
$sql= mysqli_query($conn, "SELECT AVG(Waarde) AS AveragePrice FROM DataTabel WHERE ID =2;" );
$res = mysqli_fetch_array($sql);
$gemlicht = $res['AveragePrice'];
$sql="SELECT * FROM DataTabel WHERE ID = 2";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {	
	$lastlicht=$row['Waarde'];
	$lastTijd2=$row['Tijd'];
}

header('Content-type: text/xml;charset=iso-8859-1');
echo "<?xml version='1.0'  encoding='UTF-8' ?> " . PHP_EOL;
echo "<rss version='2.0'>" . PHP_EOL;
echo "<channel>" . PHP_EOL;

echo "<title>RSS Feed</title>" . PHP_EOL;

echo "<TemperatuurSensor>" . PHP_EOL;
echo "<title>maximum</title>" . PHP_EOL;
echo "<description>".$maximumtemp."</description>" . PHP_EOL;
echo "<title>minimum</title>" . PHP_EOL;
echo "<description>".$minimumtemp."</description>" . PHP_EOL;
echo "<title>LastValue</title>" . PHP_EOL;
echo "<description>".$lasttemp."</description>" . PHP_EOL;
echo "<title>LastTime</title>" . PHP_EOL;
echo "<description>".$lastTijd1."</description>" . PHP_EOL;
echo "<title>Average</title>" . PHP_EOL;
echo "<description>".$gemtemp."</description>" . PHP_EOL;
echo "</TemperatuurSensor>" . PHP_EOL;
echo "<LichtSensor>" . PHP_EOL;
echo "<title>maximum</title>" . PHP_EOL;
echo "<description>".$maximumlicht."</description>" . PHP_EOL;
echo "<title>minimum</title>" . PHP_EOL;
echo "<description>".$minimumlicht."</description>" . PHP_EOL;
echo "<title>LastValue</title>" . PHP_EOL;
echo "<description>".$lastlicht."</description>" . PHP_EOL;
echo "<title>LastTime</title>" . PHP_EOL;
echo "<description>".$lastTijd2."</description>" . PHP_EOL;
echo "<title>Average</title>" . PHP_EOL;
echo "<description>".$gemlicht."</description>" . PHP_EOL;
echo "</LichtSensor>" . PHP_EOL;

echo"<language>en-us</language>" . PHP_EOL;


echo "</channel>" . PHP_EOL;
echo "</rss>" . PHP_EOL;


mysqli_close($conn);
?>
