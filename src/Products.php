<?php

namespace ControllerApi\Server;
use ControllerApi\Server\Assets\Querys\Register\SqlsPro;
use FluentSQL\SQL;

class Products {

    function __construct() {
        $this->data    = constant("PARAMETERS");
        $router         = constant("PARAMETERS")["router"];
        $this->$router();
    }

    public function select() 
    {
        
        $conn       = new SQL( $_ENV['DB_ENDPOINT'], constant("DB")[0]["emp_banco"],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        $result     = $conn
                        ->prepareQuery(SqlsPro::SELECT(), [])
                        ->execQuery()
                        ->build(true);

        echo json_encode($result);

    }

}

?>