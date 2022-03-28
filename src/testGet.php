//https://stackoverflow.com/questions/24014450/test-a-rest-get-request

//couldn't get phpunit set up 

class AssetTest extends PHPUnit_Framework_TestCase
{

public function request($method, $path, $options = array())
{
    // Capture STDOUT
    ob_start();

    // Prepare a mock environment
    Environment::mock(array_merge(array(
        'REQUEST_METHOD' => $method,
        'PATH_INFO' => $path,
        'SERVER_NAME' => 'slim-test.dev',
    ), $options));

    $app = new \Slim\Slim();
    $this->app = $app;
    $this->request = $app->request();
    $this->response = $app->response();

    // Return STDOUT
    return ob_get_clean();
}

   public function get($path, $options = array()){
      $this->request('GET', $path, $options);
   }
# https://stackoverflow.com/questions/24014450/test-a-rest-get-request
function testGetAssets(){
    $this->get('/?x=4&y=5');
    $response = json_decode($this->response->getBody(), true); //response body
    $headers = $this->response->getHeaders()  //response headers
    $this->assertEquals('200', $this->response->status());
}

function testGetAssets_ERROR(){
    $this->get('/?x=4');
    $response = json_decode($this->response->getBody(), true); //response body
    $headers = $this->response->getHeaders()  //response headers
    $this->assertEquals('200', $this->response->status());
}

function testGetAssets_ERROR(){
    $this->get('/?y=4');
    $response = json_decode($this->response->getBody(), true); //response body
    $headers = $this->response->getHeaders()  //response headers
    $this->assertEquals('200', $this->response->status());
}
function testGetAssets_ERROR(){
    $this->get('/?x=j&y=l');
    $response = json_decode($this->response->getBody(), true); //response body
    $headers = $this->response->getHeaders()  //response headers
    $this->assertEquals('200', $this->response->status());
}
}
