<?php 
session_start();
$id=$_SESSION['id'];

require_once 'database_connections.php';

// Fetching and decoding the inserted data
$data = json_decode(file_get_contents("php://input")); 

// Escaping special characters from submitting data & storing in new variables.
$title = pg_escape_string($con, $data->title);
$description = pg_escape_string($con, $data->description);
$start_dt = pg_escape_string($con, $data->start_dt);
$end_dt = pg_escape_string($con, $data->end_dt);
$employee_id = pg_escape_string($con, $data->executor_id);
$stage_id = pg_escape_string($con, $data->stage_id);
$is_done = pg_escape_string($con, $data->status);

$query_id = pg_query("SELECT max(project_id) FROM project_manager WHERE employee_id='$id'");
$project_id = pg_fetch_array($query_id);
$project_id = $project_id[0];


$query_add_task = pg_query("INSERT INTO task( title, description, is_done, start_dt, end_dt, project_id, stage_id ) 
							VALUES ('$title', '$description', '$is_done', '$start_dt', '$end_dt', '$project_id', '$stage_id') ");
$query_task_id = pg_query("SELECT max(id) FROM task");
$task_id = pg_fetch_array($query_task_id);
$task_id = $task_id[0];

$query = "INSERT INTO task_executor( employee_id, task_id) VALUES ('$employee_id', '$task_id') ";

$result = pg_query($con, $query);

?>