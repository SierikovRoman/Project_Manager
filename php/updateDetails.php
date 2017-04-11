<?php 
// Including database connections
require_once 'database_connections.php';

// Fetching the updated data & storin in new variables
$data = json_decode(file_get_contents("php://input"));

// Escaping special characters from updated data
$id = pg_escape_string($con, $data->id);
$name = pg_escape_string($con, $data->name);
$surname = pg_escape_string($con, $data->surname);
$email = pg_escape_string($con, $data->email);
$access_type = pg_escape_string($con, $data->access_id);
$position = pg_escape_string($con, $data->position_id);
$password = pg_escape_string($con, $data->password);

// pg query to insert the updated data
// $query = "UPDATE member SET name='test-4', surname='test-4', email='test-4@gmail.com', access_type = 2, position = 1, password='12345' WHERE id = 33 ";

$query = "UPDATE member SET name = '$name', surname = '$surname', email = '$email', access_type = '$access_type', position = '$position', password = '$password' WHERE id = '$id';";

// Updating data into database
$result = pg_query($con, $query);
echo true;

?>