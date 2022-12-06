<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost","root","","prestige");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
}
  exit();

$sqlQuery = "SELECT vehicle_id,vehicle_model FROM vehicle_reg ORDER BY vehicle_id AND SELECT vehicle_type,count(*) as Total from CountSameValue group by Marks";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>