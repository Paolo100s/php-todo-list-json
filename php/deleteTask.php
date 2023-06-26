<?php

header("Access-Control-Allow-Origin: http://localhost:5173/");
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');

$data = $_POST;
$index = $data["index"];

$dbStr = file_get_contents("data.json");
$db = json_decode($dbStr);

array_splice($db, $index, 1);

$dbStr = json_encode($db);

file_put_contents("data.json", $dbStr);
echo $dbStr;

?>