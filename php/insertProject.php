<?php 
// Including database connections
require_once 'database_connections.php';

// Fetching and decoding the inserted data
$data = json_decode(file_get_contents("php://input")); 

// Escaping special characters from submitting data & storing in new variables.
$title = pg_escape_string($con, $data->title);
$start_dt = pg_escape_string($con, $data->start_dt);
$end_dt = pg_escape_string($con, $data->end_dt);
$emp_id = pg_escape_string($con, $data->emp_id);
$progress = pg_escape_string($con, $data->progress);

echo $title;
echo "</br>";
echo $start_dt;
echo "</br>";
echo $end_dt;
echo "</br>";
echo $emp_id;
echo "</br>";
echo $progress;

// pg insert query
//$query = "INSERT INTO project(title, start_dt, end_dt, progress) VALUES ('$title', '$start_dt', '$end_dt', '$emp_id');";

//$query_proj = pg_query("INSERT INTO project(title, start_dt, end_dt, progress) VALUES ('TEST', '2017-04-03', '2017-04-04', '0');");

$project_id = pg_query("SELECT max(id) FROM project");

// $query = "SELECT max(id) FROM project";

//$project_id=pg_fetch_array($query_id);
//$query_q = pg_query("INSERT INTO project_manager(project_id, employee_id) VALUES ( '$project_id', 41 );");

$query = "SELECT * FROM project_manager";

// Inserting data into database
// $result = pg_query($con, $query);
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