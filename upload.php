<!DOCTYPE php>
<?php
error_reporting(0);
set_time_limit(5000000000000000000000);
include "PhpSerial.php";
$servername = "localhost";
$username = "student_11903162";
$password = "ynLTL67hsDHm";
$dbname = "student_11903162";
$serial = new phpSerial();
$serial->deviceSet("/dev/cu.usbmodem14101");
$serial->deviceOpen('r+');
$serial->confBaudRate(9600);

$conn = new mysqli($servername, $username, $password, $dbname);// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
while(1){

$Lees=$serial->readPort();
echo $Lees;

$ID = substr($Lees, 0, 1);
$Waarde=substr($Lees,1,8);

if (!empty($Waarde)){
if (!empty($ID)){
$host = "localhost";

$sql = "INSERT INTO DataTabel (Waarde, ID)
VALUES ('$line','$ID')";


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
}	}}}
	
// If you want to change the configuration, the device must be closed
$serial->deviceClose();



?>
