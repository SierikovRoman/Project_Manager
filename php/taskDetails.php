<?php
session_start();
$id=$_SESSION['id'];

// Including database connections
require_once 'database_connections.php'; 
// mysqli query to fetch all data from database

$query_id = pg_query("SELECT max(project_id) FROM project_manager WHERE employee_id='$id'");
$project_id = pg_fetch_array($query_id);
$project_id = $project_id[0];

if ($id!=2) {
	//$query = "SELECT * FROM task WHERE project_id='$project_id' ";
	
	$query = "SELECT t.id, t.title, t.description, t.start_dt, t.end_dt, m.name AS member_name, t.is_done FROM task t
  			  LEFT JOIN task_executor tx ON t.id = tx.task_id
  			  LEFT JOIN member m ON tx.employee_id = m.id
  			  WHERE t.project_id = '$project_id' ;";
}else{
	$query = "SELECT * FROM task ";
}

//$query = "SELECT * FROM task WHERE project_id='$project_id" ;

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