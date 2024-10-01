<?php

namespace ControllerApi\Server;
use ControllerApi\Server\Assets\Querys\Register\SqlsPro;
use FluentSQL\SQL;

class Products {

    function __construct() {
        $this->data    = constant("PARAMETERS");
        $router         = constant("PARAMETERS")["router"];
        // var_dump($router);
        $this->$router();
    }

    public function read() 
    {
        
        $conn       = new SQL( $_ENV['DB_ENDPOINT'], constant("DB")[0]["emp_banco"],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        $result     = $conn
                        ->prepareQuery(SqlsPro::READ(), [])
                        ->execQuery()
                        ->build(true);

        echo json_encode($result);

    }

    public function create() 
    {
        
        $conn       = new SQL( $_ENV['DB_ENDPOINT'], constant("DB")[0]["emp_banco"],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        $data       = constant("PARAMETERS")["data"];
        $params     = array(
            array("key" => ":PRO_NOME",  "value" => $data["pro_nome"], "type" => "normal"),
            array("key" => ":PRO_PRECO",  "value" => $data["pro_preco"], "type" => "normal"),
            array("key" => ":PRO_UNIDADE",  "value" => $data["pro_unidade"], "type" => "upper"),
            array("key" => ":PRO_COMPRA",  "value" => $data["pro_compra"], "type" => "upper"),
            array("key" => ":PRO_VENDE",  "value" => $data["pro_vende"], "type" => "upper"),
            array("key" => ":PRO_ESTOQUE",  "value" => $data["pro_estoque"], "type" => "upper"),
            array("key" => ":PRO_ATIVO",  "value" => $data["pro_ativo"], "type" => "upper")
            
        );
        $result     = $conn
                        ->prepareQuery(SqlsPro::CREATE(), $params)
                        ->sqlCommand()
                        ->execQuery();
       
        echo json_encode(
            array(
                "sts" => $conn->rows < 1 ? "war" : "ok",
                "rows" => $conn->rows
            )
        );

    }

    public function update() 
    {
        // var_dump("hahaha");
        $conn       = new SQL( $_ENV['DB_ENDPOINT'], constant("DB")[0]["emp_banco"],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        $data       = constant("PARAMETERS")["data"];
        $params     = array(
            array("key" => ":PRO_NOME",  "value" => $data["pro_nome"], "type" => "normal"),
            array("key" => ":PRO_PRECO",  "value" => $data["pro_preco"], "type" => "normal"),
            array("key" => ":PRO_UNIDADE",  "value" => $data["pro_unidade"], "type" => "upper"),
            array("key" => ":PRO_COMPRA",  "value" => $data["pro_compra"], "type" => "upper"),
            array("key" => ":PRO_VENDE",  "value" => $data["pro_vende"], "type" => "upper"),
            array("key" => ":PRO_ESTOQUE",  "value" => $data["pro_estoque"], "type" => "upper"),
            array("key" => ":PRO_ATIVO",  "value" => $data["pro_ativo"], "type" => "upper"),
            array("key" => ":PRO_CODIGO",  "value" => $data["pro_codigo"], "type" => "int")
            
        );
        $result     = $conn
                        ->prepareQuery(SqlsPro::UPDATE(), $params)
                        ->sqlCommand()
                        ->execQuery();

        echo json_encode(
            array(
                "sts" => $conn->rows < 1 ? "war" : "ok",
                "rows" => $conn->rows
            )
        );
                

    }

    public function delete() 
    {
        
        $conn       = new SQL( $_ENV['DB_ENDPOINT'], constant("DB")[0]["emp_banco"],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        $data       = constant("PARAMETERS")["data"];
        $params     = array(
            array("key" => ":PRO_CODIGO",  "value" => $data["pro_codigo"], "type" => "int")
        );
        $result     = $conn
                        ->prepareQuery(SqlsPro::DELETE(), $params)
                        ->sqlCommand()
                        ->execQuery();

        echo json_encode(
            array(
                "sts" => $conn->rows < 1 ? "war" : "ok",
                "rows" => $conn->rows
            )
        );
                

    }

}

?>