<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
require('functions.inc.php');

$output = array(
	"error" => false,
	"string" => "",
	"answer" => 0
);
$x;
$y;
try{
$x = $_REQUEST['x'];
$y = $_REQUEST['y'];
}
catch(Exception $e){
	$output['error']=true;
	echo $e->getMessage();
}

$answer=add($x,$y);

$output['string']=$x."+".$y."=".$answer;
$output['answer']=$answer;

echo json_encode($output);
exit();
