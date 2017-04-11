<?php 
// Including database connections
require_once 'database_connections.php';

// Fetching the updated data & storin in new variables
$data = json_decode(file_get_contents("php://input"));

// Escaping special characters from updated data
$id = pg_escape_string($con, $data->id);
$title = pg_escape_string($con, $data->title);
$start_dt = pg_escape_string($con, $data->start_dt);
$end_dt = pg_escape_string($con, $data->end_dt);
//$project_id = pg_escape_string($con, $data->emp_id); // доделать изменение куратора проекта
//$progress = pg_escape_string($con, $data->progress);

// pg query to insert the updated data
//$query = "UPDATE project SET title = 'Qwerty', start_dt = '2016-06-06', end_dt = '2017-07-07', progress = '0' WHERE id = '3' ";

$query = "UPDATE project SET title = '$title', start_dt = '$start_dt', end_dt = '$end_dt', progress = '0' WHERE id = '$id';";

// Updating data into database
$result = pg_query($con, $query);
echo true;

?>