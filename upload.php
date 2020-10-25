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
$this->phpserial->deviceSet("/dev/tty.usbmodem411");	
// We can change the baud rate
$this->phpserial->confBaudRate(115200); 	
		
		
// Then we need to open it
$this->phpserial->deviceOpen();
		
// To write into
//$this->phpserial->sendMessage("r");
		
// Or to read from
while(1){
$read = $this->phpserial->readPort();
		
$line = $this->phpserial->readPort();
			
print_r($line);
$ID = substr($line, 0, 1);
$Waarde=substr($line,1,8);

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
}	}
// If you want to change the configuration, the device must be closed
$this->phpserial->deviceClose();
$conn->close();
?>
