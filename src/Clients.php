<?php

namespace ControllerApi\Server;
use ControllerApi\Server\Assets\Querys\Register\SqlsCli;
use FluentSQL\SQL;

class Clients {
    function __construct() {
        $this->data    = constant("PARAMETERS");
        $router         = constant("PARAMETERS")["router"];
        $this->$router();
    }

    public function read() 
    {
        
        $conn       = new SQL( $_ENV['DB_ENDPOINT'], constant("DB")[0]["emp_banco"],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        $result     = $conn
                        ->prepareQuery(SqlsCli::READ(), [])
                        ->execQuery()
                        ->build(true);

        echo json_encode($result);

    }

    public function create() 
    {
        
        $conn       = new SQL( $_ENV['DB_ENDPOINT'], constant("DB")[0]["emp_banco"],  $_ENV['DB_USER'], $_ENV['DB_PASSWORD'] );
        $data       = constant("PARAMETERS")["params"];
        $params     = array(
            array("key" => ":CLI_NOME",  "value" => $data["cli_nome"], "type" => "normal"),
            array("key" => ":CLI_RAZAO",  "value" => $data["cli_razao"], "type" => "normal"),
            array("key" => ":CLI_CNPJCPF",  "value" => $data["cli_cnpjcpf"], "type" => "normal"),
            array("key" => ":CLI_IE",  "value" => $data["cli_ie"], "type" => "normal"),
            array("key" => ":CLI_IM",  "value" => $data["cli_im"], "type" => "normal"),
            array("key" => ":CLI_ENDERECO",  "value" => $data["cli_endereco"], "type" => "normal"),
            array("key" => ":CLI_NUMERO",  "value" => $data["cli_numero"], "type" => "normal"),
            array("key" => ":CLI_BAIRRO",  "value" => $data["cli_bairro"], "type" => "normal"),
            array("key" => ":CLI_CEP",  "value" => $data["cli_cep"], "type" => "normal"),
            array("key" => ":CLI_UF",  "value" => $data["cli_uf"], "type" => "upper"),
            array("key" => ":CLI_MUNICIPIO",  "value" => $data["cli_municipio"], "type" => "normal"),
            array("key" => ":CLI_TELEFONES",  "value" => $data["cli_telefones"], "type" => "normal"),
            array("key" => ":CLI_PRAZO",  "value" => $data["cli_prazo"], "type" => "int"),
            array("key" => ":CLI_TIPO",  "value" => $data["cli_tipo"], "type" => "upper"),
            array("key" => ":CLI_NFE",  "value" => $data["cli_nfe"], "type" => "upper"),
            array("key" => ":CLI_ATIVO",  "value" => $data["cli_ativo"], "type" => "upper")
        );
        $result     = $conn
                        ->prepareQuery(SqlsCli::CREATE(), $params)
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
        $data       = constant("PARAMETERS")["params"];
        $params     = array(
            array("key" => ":CLI_NOME",  "value" => $data["cli_nome"], "type" => "normal"),
            array("key" => ":CLI_RAZAO",  "value" => $data["cli_razao"], "type" => "normal"),
            array("key" => ":CLI_CNPJCPF",  "value" => $data["cli_cnpjcpf"], "type" => "normal"),
            array("key" => ":CLI_IE",  "value" => $data["cli_ie"], "type" => "normal"),
            array("key" => ":CLI_IM",  "value" => $data["cli_im"], "type" => "normal"),
            array("key" => ":CLI_ENDERECO",  "value" => $data["cli_endereco"], "type" => "normal"),
            array("key" => ":CLI_NUMERO",  "value" => $data["cli_numero"], "type" => "normal"),
            array("key" => ":CLI_BAIRRO",  "value" => $data["cli_bairro"], "type" => "normal"),
            array("key" => ":CLI_CEP",  "value" => $data["cli_cep"], "type" => "normal"),
            array("key" => ":CLI_UF",  "value" => $data["cli_uf"], "type" => "upper"),
            array("key" => ":CLI_MUNICIPIO",  "value" => $data["cli_municipio"], "type" => "normal"),
            array("key" => ":CLI_TELEFONES",  "value" => $data["cli_telefones"], "type" => "normal"),
            array("key" => ":CLI_PRAZO",  "value" => $data["cli_prazo"], "type" => "int"),
            array("key" => ":CLI_TIPO",  "value" => $data["cli_tipo"], "type" => "upper"),
            array("key" => ":CLI_NFE",  "value" => $data["cli_nfe"], "type" => "upper"),
            array("key" => ":CLI_ATIVO",  "value" => $data["cli_ativo"], "type" => "upper"),
            array("key" => ":CLI_CODIGO",  "value" => $data["cli_codigo"], "type" => "int")
            
        );
        $result     = $conn
                        ->prepareQuery(SqlsCli::UPDATE(), $params)
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
        $data       = constant("PARAMETERS")["params"];
        $params     = array(
            array("key" => ":CLI_CODIGO",  "value" => $data["cli_codigo"], "type" => "int")
        );
        $result     = $conn
                        ->prepareQuery(SqlsCli::DELETE(), $params)
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