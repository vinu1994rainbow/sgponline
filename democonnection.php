<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "location_db";

// Create connection
$conn123 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn123->connect_error) {
  die("Connection failed: " . $conn123->connect_error);
}

$sql = "SELECT * FROM cities";
$result123 = $conn123->query($sql);

if ($result123->num_rows > 0) {
  // output data of each row
  while($row123 = $result123->fetch_assoc()) {
    echo "id: " . $row123["sub_ID"]. " - Name: " . $row123["sub_name"]. " " . $row123["sub_code"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn123->close();
?>