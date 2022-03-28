<?php
echo "Test Script Starting\n";
require('functions.inc.php');

# https://stackoverflow.com/questions/24014450/test-a-rest-get-request
function testGetAssets(){
    $this->get('/?x=4&y=5');
    $response = json_decode($this->response->getBody(), true); //response body
    $headers = $this->response->getHeaders()  //response headers
    $this->assertEquals('200', $this->response->status());
}

$x=10;
$y=5;
$expect=15;

$answer=add($x,$y);

echo "Test Result: ".$x."+".$y."=".$answer." (expected: ".$expect.")\n";

if ($answer==$expect)
{
    echo "Test Passed\n";
    exit(0); // exit code 0 - success
}
else
{
    echo "Test Failed\n";
    exit(1); // exit code not zero - error
}
