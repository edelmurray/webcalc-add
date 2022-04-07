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

if (false == strpos($_SERVER['REQUEST_URI'], 'x') || false == strpos($_SERVER['REQUEST_URI'], 'y')) {
	$output['error']=true;
	$output['string']='No parameters provided';
	http_response_code(404);
	echo json_encode($output);
	exit();
}

$x = $_REQUEST['x'];
$y = $_REQUEST['y'];

if(!ctype_digit($x)||!ctype_digit($y)){
	$output['error']=true;
	$output['string']='Parameters must be integers';
	http_response_code(404);
	echo json_encode($output);
	exit();
}

$x = $_REQUEST['x'];
$y = $_REQUEST['y'];

$answer=add($x,$y);

$output['string']=$x."+".$y."=".$answer;
$output['answer']=$answer;
http_response_code(200);

echo json_encode($output);
exit();
?>
