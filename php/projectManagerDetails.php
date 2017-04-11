<?php
// Including database connections
require_once 'database_connections.php'; 
// mysqli query to fetch all data from database

//$query = "SELECT * FROM member"; // JOIN access_type ON member.access_type = access_type.id LEFT JOIN position ON member.position = position.id

$query = "SELECT id, name, surname FROM member WHERE position = '1'";

$result = pg_query($con, $query);

$arr = array();
if(pg_num_rows($result) != 0) {
	while($row = pg_fetch_assoc($result)) {
			$arr[] = $row;
	}
}

// Return json array containing data from the database
echo $json_info = json_encode($arr);
?>