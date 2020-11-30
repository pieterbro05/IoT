<?php 

$servername = "localhost";
$username = "student_11903162";
$password = "ynLTL67hsDHm";
$dbname = "student_11903162";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql= mysqli_query($conn, "SELECT MAX( Waarde ) AS max FROM `DataTabel`;" );
$res = mysqli_fetch_array( $sql);
$maximum = $res['max'];

header('Content-type: text/xml;charset=iso-8859-1');
echo "<?xml version='1.0'  encoding='UTF-8' ?> " . PHP_EOL;
echo "<rss version='2.0'>" . PHP_EOL;
echo "<channel>" . PHP_EOL;

echo "<title>RSS Feed</title>" . PHP_EOL;


echo "<item>" . PHP_EOL;
echo "<title>max</title>" . PHP_EOL;
echo "<description>".$maximum."<\description>" . PHP_EOL;

echo "</item>" . PHP_EOL;
echo"<language>en-us</language>" . PHP_EOL;


echo "</channel>" . PHP_EOL;
echo "</rss>" . PHP_EOL;


mysqli_close($conn);
?>