<?php
session_start();
$id=$_SESSION['id'];
include 'database_connections.php';

$data = json_decode(file_get_contents("php://input"));

$query_get_lang = pg_query("SELECT FROM language");
$lang_id=pg_fetch_array($query_get_lang);
$lang_id=$lang_id[0];

if ($lang_id == 1) {
	$query = pg_query("UPDATE language SET lang='en' WHERE id='$lang_id' ");
}else{
	$query = pg_query("UPDATE language SET lang='ukr' WHERE id='$lang_id' ");
}

// $result = pg_query($con, $query);
echo "true";
?>