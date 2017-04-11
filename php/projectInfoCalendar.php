<?php

	// Including database connections
	require_once 'database_connections.php';
	
	$query = "SELECT id, title, start_dt AS start, end_dt AS end FROM project";
	$result = pg_query($query);
	$arr = array();
	while($row = pg_fetch_assoc($result)){
		 $arr[] = $row; 
	}  
	echo json_encode($arr);


//------ FOR TESTING RESULT.JSON


	// $sql="SELECT * FROM project"; 

	// $response = array();
	// $projects = array();
	// $result=pg_query($sql);
	// while($row=pg_fetch_array($result)) 
	// {
	// $id=$row['id'];
	// $title=$row['title']; 
	// $start_date=$row['start_dt']; 
	// $end_date=$row['end_dt']; 

	// $projects[] = array('id'=>$id, 'title'=> $title, 'start_dt'=> $start_date, 'end_dt'=> $end_date);

	// } 

	// $response['project'] = $projects;

	// $fp = fopen('results.json', 'w');
	// fwrite($fp, json_encode($response));
	// fclose($fp);


?>