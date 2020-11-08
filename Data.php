<!DOCTYPE php>
<?php

$servername = "localhost";
$username = "student_11903162";
$password = "ynLTL67hsDHm";
$dbname = "student_11903162";

$conn = new mysqli($servername, $username, $password, $dbname);// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$Lees=htmlspecialchars($_GET["Lees"]);
$sensornaam='LichtSensor';

$ID = substr($Lees, 0, 1);
$Waarde=substr($Lees,1,8);

if (!empty($Waarde)){
if (!empty($ID)){
$host = "localhost";

$sql = "INSERT INTO DataTabel (Waarde, ID) VALUES ('$Waarde','$ID')";


if ($conn->query($sql) === TRUE) {
  echo "OK <br>" ;//. $sql;
} 
else {
  echo "NOK" . $sql . "<br>" . $conn->error;
}
if($ID){
$sql = "UPDATE SensorTabel SET Waarde='$Waarde', Naam= 'TemperatuurSensor', IP='2a02:1810:9534:ba00:a1bc:969c:cea:f1a3'  WHERE id=$ID";
}
else{
$sql = "UPDATE SensorTabel SET Waarde='$Waarde', Naam= '$sensornaam', IP='2a02:1810:9534:ba00:a1bc:969c:cea:f1a3' WHERE id=$ID";
}

if ($conn->query($sql) === TRUE) {
  echo "OK <br>" ;//. $sql;
} 
else {
  echo "NOK" . $sql . "<br>" . $conn->error;
}	}}
	



?>

