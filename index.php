<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Max-Age: 86400");

define( "PARAMETERS", json_decode(file_get_contents("php://input"), true) );

require_once(
    "vendor/autoload.php"
);

// use EController\Assets\Authentication;
// use EController\Preview;
// use EController\Transmit;
// use EController\Consult;
// use EController\Cancel;
// use EController\ConsultDfe;

//.ENV
$env = Dotenv::createImmutable( __DIR__ . "/src/Enviroments/" );
$env->load();

//AUTHENTICATION
$decoded = Authentication::decoded( $_SERVER["HTTP_AUTHORIZATION"] );
if( $decoded["statments"] === "OK" )
{

    // $decoded = array( //mock
    //     "dataEmp" => array(
    //         "emp_codigo" => "CFR",
    //         "emp_banco" => "rastza11_controller_cfr",
    //     )    
    // );
    

    define("DB", $decoded["dataEmp"] );
    if ( isset(constant("PARAMETERS")["action"]) && !empty(constant("PARAMETERS")["action"]) )
        {
            
            $class = array(
                "Products" => function () {
                    return new Products();
                },
                "Transmit" => function () {
                    return new Transmit();
                },
                "Consult" => function () {
                    return new Consult();
                },
                "Cancel" => function () {
                    return new Cancel();
                },
                "ConsultDfe" => function () {
                    return new ConsultDfe();
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