<?php

namespace ControllerApi\Server;
use FluentSQL\SQL;
use Querys\Register\SqlsPro;

class Products {

    function __construct() {
        $this->$data    = constant("PARAMETERS");
        $router         = constant("PARAMETERS")["router"];
        $this->$router();
    }

    public function select() 
    {
        $conn       = new SQL( $_ENV['DB_ENDPOINT'], $_ENV['DB_ADMIN'],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        $result     = $conn
                        ->prepareQuery(SqlsPro::SELECT(), [])
                        ->execQuery()
                        ->build(true);

        echo json_encode($result);

    }

}

?>