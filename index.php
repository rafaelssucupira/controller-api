<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Max-Age: 86400");

define( "PARAMETERS", json_decode(file_get_contents("php://input"), true) );

require_once(
    "vendor/autoload.php"
);

use ControllerApi\Server\Buy;
use ControllerApi\Server\Sale;
use ControllerApi\Server\Clients;
use ControllerApi\Server\Products;
use ControllerApi\Server\Authentication;
use ControllerApi\Server\Tax;
use ControllerApi\Server\Users;
use ControllerApi\Server\Password;

//.ENV
$env = Dotenv\Dotenv::createImmutable( 
    __DIR__ . "/src/Assets/Tools/Enviroments/"
 )->load();


//AUTHENTICATION
// $decoded = Authentication::decoded( $_SERVER["HTTP_AUTHORIZATION"] );
$decoded = array( //mock
    "statments" => "OK",
    "dataEmp" => array(array(
        "emp_codigo" => "DEM",
        "emp_banco" => "rastza11_controller_dem",
    ) )   
);
if( $decoded["statments"] === "OK" )
{
    define("DB", $decoded["dataEmp"] );
    if ( isset(constant("PARAMETERS")["action"]) && !empty(constant("PARAMETERS")["action"]) )
        {
          
            $class = array(
                "Products" => function () {
                    return new Products();
                },
                "Clients" => function () {
                    return new Clients();
                }
            );   
            
            $action = constant("PARAMETERS")["action"];
            $result = $class[$action]();
            exit;
            
        }
}
else
{
    echo json_encode($decoded);
}

?>