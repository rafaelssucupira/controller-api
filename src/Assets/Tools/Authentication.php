<?php
namespace ControllerApi\Assets\Tools;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use FluentSQL\SQL;
// use Dotenv\Dotenv;
use UnexpectedValueException;

class Authentication
{
    public $resp;


    public static function SELECT()
    {
        return "select
                emp.emp_codigo,
                emp.emp_banco
                from tkm tkm, usu usu, emp emp
                where
                tkm.tkm_tokem = :TKM_TOKEM and
                tkm.usu_nome = usu.usu_nome and
                usu.emp_codigo = emp.emp_codigo and
                usu.usu_ativo = 'S' and
                emp.emp_ativa = 'S'";
    }
    

    public static function decoded( $tokem )
        {
            $authorization = $tokem ?? $_SERVER["HTTP_AUTHORIZATION"];
            $j = str_replace( "Bearer ", "", $tokem);
            try
                {
                    // Dotenv::createImmutable( __DIR__ . "/src/Assets/Enviroments/" )->load();

                    $isOK       = JWT::decode($j, new Key("reggaeraiz27", "HS256") ) ; //ESTOURA EXCEÇÃO SE NÃO FOR VÁLIDO
                    $conn       = new SQL( $_ENV['DB_ENDPOINT'], $_ENV['DB_ADMIN'],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        
                    $params     =  array( array("key" => ":TKM_TOKEM",  "value" => $j, "type" => "normal"));
                    $result     = $conn
                                    ->prepareQuery(self::SELECT(), $params)
                                    ->execQuery()
                                    ->build(true);
                    $conn = null;
                    return array(
                        "statments" => "OK",
                        "dataEmp" => $result
                    );

                }
          
            catch (UnexpectedValueException $e) 
                {
                    
                    if($e->getMessage() === "Expired token")
                        {
                            return array( "codeError" => "401", "msg"=>"Sessão Expirada!" );
                        }

                    return array( "codeError" => "403", "msg"=>"Não Autorizado!" );

                }   

        }

}


?>
