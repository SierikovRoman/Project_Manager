<?php
include 'database_connections.php';
$email= $_POST['email'];
$password=$_POST['password'];

//$query = "SELECT * FROM project WHERE model_id = 2";
//$query = "SELECT p.id, p.title, p.start_dt, p.end_dt, p.progress, mod.name ,mem.name FROM project p LEFT JOIN model mod ON p.model_id = mod.project_id LEFT JOIN project_manager pr ON p.id = pr.project_id LEFT JOIN member mem ON mem.id = pr.employee_id ;";

//$query = "SELECT * FROM member WHERE position_id != 0 & 1";

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