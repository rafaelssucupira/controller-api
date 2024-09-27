<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Max-Age: 86400");

define( "PARAMETERS", json_decode(file_get_contents("php://input"), true) );

require_once(
    "vendor/autoload.php"
);
use ControllerApi\Assets\Buy;
use ControllerApi\Assets\Sale;
use ControllerApi\Assets\Clients;
use ControllerApi\Assets\Products;
use ControllerApi\Assets\Authentication;
use ControllerApi\Assets\Tax;
use ControllerApi\Assets\Users;
use ControllerApi\Assets\Password;

//.ENV
$env = Dotenv::createImmutable( __DIR__ . "/src/Enviroments/" );
$env->load();

//AUTHENTICATION
$decoded = Authentication::decoded( $_SERVER["HTTP_AUTHORIZATION"] );
if( $decoded["statments"] === "OK" )
{

    define("DB", $decoded["dataEmp"] );
    if ( isset(constant("PARAMETERS")["action"]) && !empty(constant("PARAMETERS")["action"]) )
        {
            try {
                $action = constant("PARAMETERS")["action"];
                $class = new $action();
            }
            catch(\Exception $e ) {
                echo json_encode(array(
                    "statments" => "warning",
                    "message" => $e->getMessage()
                ));
            }
            exit;
            
        }
}
else
{
    echo json_encode($decoded);
}

?>