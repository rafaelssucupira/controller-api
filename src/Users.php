<?php

namespace ControllerApi\Server;
use ControllerApi\Server\Assets\Querys\Register\SqlsUsu;
use FluentSQL\SQL;

class Users {
    function __construct() {
        $this->data    = constant("PARAMETERS");
        $router         = constant("PARAMETERS")["router"];
        $this->$router();
        
    }

    public function read() 
    {
        
        $conn       = new SQL( $_ENV['DB_ENDPOINT'], $_ENV['DB_ADMIN'],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        $data       = constant("PARAMETERS")["params"];
        $params     = array(
            array("key" => ":USU_NOME",  "value" => $data["usu_nome"], "type" => "normal"),
            array("key" => ":EMP_CODIGO",  "value" => $data["emp_codigo"], "type" => "upper")
        );
        $result     = $conn
                        ->prepareQuery(SqlsUsu::READ(), $params)
                        ->execQuery()
                        ->sqlCommand()
                        ->build(true);

        echo json_encode($result);

    }

    public function create() 
    {
        
        $conn       = new SQL( $_ENV['DB_ENDPOINT'], $_ENV['DB_ADMIN'],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        $data       = constant("PARAMETERS")["params"];
        
        $params     = array(
            array("key" => ":USU_NOME",  "value" => $data["usu_nome"], "type" => "normal"),
            array("key" => ":USU_SENHA",  "value" => $data["usu_senha"], "type" => "normal"),
            array("key" => ":USU_NIVEL",  "value" => $data["usu_nivel"], "type" => "upper"),
            array("key" => ":USU_ATIVO",  "value" => $data["usu_ativo"], "type" => "upper"),
            array("key" => ":EMP_CODIGO",  "value" => $data["emp_codigo"], "type" => "upper")
        );

        $result     = $conn
                        ->prepareQuery(SqlsUsu::CREATE(), $params)
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
    
        $conn       = new SQL( $_ENV['DB_ENDPOINT'], $_ENV['DB_ADMIN'],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        $data       = constant("PARAMETERS")["params"];
        $params     = array(
            array("key" => ":USU_SENHA",  "value" => $data["usu_senha"], "type" => "normal"),
            array("key" => ":USU_NIVEL",  "value" => $data["usu_nivel"], "type" => "upper"),
            array("key" => ":USU_ATIVO",  "value" => $data["usu_ativo"], "type" => "upper"),
            array("key" => ":USU_NOME",  "value" => $data["usu_nome"], "type" => "normal"),
            array("key" => ":EMP_CODIGO",  "value" => $data["emp_codigo"], "type" => "upper")
            
        );
        $result     = $conn
                        ->prepareQuery(SqlsUsu::UPDATE(), $params)
                        ->sqlCommand()
                        ->execQuery();

        echo json_encode(
            array(
                "sts" => $conn->rows < 1 ? "war" : "ok",
                "rows" => $conn->rows
            )
        );
                

    }

    public function password() 
    {
        
        $conn       = new SQL( $_ENV['DB_ENDPOINT'], $_ENV['DB_ADMIN'],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        $data       = constant("PARAMETERS")["params"];
        $params     = array(
            array("key" => ":USU_NOME",  "value" => $data["usu_nome"], "type" => "normal"),
            array("key" => ":USU_SENHA",  "value" => $data["usu_senha"], "type" => "normal"),
            array("key" => ":EMP_CODIGO",  "value" => $data["emp_codigo"], "type" => "upper")
        );
        $result     = $conn
                        ->prepareQuery(SqlsUsu::PASSWORD(), $params)
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
        
        $conn       = new SQL( $_ENV['DB_ENDPOINT'], $_ENV['DB_ADMIN'],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        $data       = constant("PARAMETERS")["params"];
        $params     = array(
            array("key" => ":USU_NOME",  "value" => $data["usu_nome"], "type" => "normal"),
            array("key" => ":EMP_CODIGO",  "value" => $data["emp_codigo"], "type" => "upper")
        );
        $result     = $conn
                        ->prepareQuery(SqlsUsu::DELETE(), $params)
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