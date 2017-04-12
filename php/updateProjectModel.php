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
$project_id = pg_escape_string($con, $data->model_id); // доделать изменение куратора проекта


$query = "UPDATE project SET title = '$title', start_dt = '$start_dt', end_dt = '$end_dt', progress = '0', model_id = '$project_id' WHERE id = '$id';";

// Updating data into database
$result = pg_query($con, $query);
echo true;

?>