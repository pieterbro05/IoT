<!DOCTYPE php>
<?php
$servername = "localhost";
$username = "student_11903162";
$password = "ynLTL67hsDHm";
$dbname = "student_11903162";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$Waarde = filter_input(INPUT_POST, 'Waarde');
$ID = filter_input(INPUT_POST, 'ID');

if (!empty($Waarde)){
if (!empty($ID)){
$host = "localhost";

$sql = "INSERT INTO DataTabel (Waarde, ID)
VALUES ('$Waarde','$ID')";


if ($conn->query($sql) === TRUE) {
  echo "OK <br>" ;//. $sql;
} 
else {
  echo "NOK" . $sql . "<br>" . $conn->error;
}
if($ID){
$sql = "UPDATE SensorTabel SET Waarde='$Waarde', Naam= 'TemperatuurSensor' WHERE id=$ID";
}
else{
$sql = "UPDATE SensorTabel SET Waarde='$Waarde', Naam= 'LichtSensor' WHERE id=$ID";
}
if ($conn->query($sql) === TRUE) {
  echo "OK <br>" ;//. $sql;
} 
else {
  echo "NOK" . $sql . "<br>" . $conn->error;
}
}}
$conn->close();
?>
