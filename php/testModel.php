<?php
include 'database_connections.php';
$email= $_POST['email'];
$password=$_POST['password'];

$query = "SELECT * FROM project WHERE model_id = 2";
$result = pg_query($con, $query);
echo true;

$arr = array();
if(pg_num_rows($result) != 0) {
	while($row = pg_fetch_assoc($result)) {
			$arr[] = $row;
	}
}

echo $json_info = json_encode($arr);
?>