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
$read = $this->phpserial->readPort();
		
$line = $this->phpserial->readPort();
			
print_r($line);
		
// If you want to change the configuration, the device must be closed
$this->phpserial->deviceClose();		

$Waarde = filter_input(INPUT_POST, 'Waarde');
$ID = filter_input(INPUT_POST, 'ID');

if (!empty($Waarde)){
if (!empty($ID)){
$host = "localhost";

$sql = "INSERT INTO Data (Waarde, ID)
VALUES ('$Waarde','$ID')";
}}


$sql = "UPDATE SensorTabel SET ID='ID' WHERE nr=1";

if ($conn->query($sql) === TRUE) {
  echo "OK <br>" ;//. $sql;
} 
else {
  echo "NOK" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
