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
