<?php

header("Access-Control-Allow-Origin: http://localhost:5173/");
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');

$data = $_POST;
$data["completed"] = false;

$dbStr = file_get_contents("data.json");
$db = json_decode($dbStr);

$db[] = $data;

$dbStr = json_encode($db);

file_put_contents("data.json", $dbStr);
echo $dbStr;

?>