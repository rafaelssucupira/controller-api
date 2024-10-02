<?php
namespace ControllerApi\Server\Assets\Querys\Register;

class SqlsCli 
{
    public static function READ() 
        {
            return "select 
                    cli.cli_codigo,  
                    cli.cli_nome,
                    cli.cli_razao,
                    cli.cli_cnpjcpf,
                    cli.cli_ie,
                    cli.cli_im,
                    cli.cli_endereco,
                    cli.cli_numero,
                    cli.cli_bairro,
                    cli.cli_cep,
                    cli.cli_uf,
                    cli.cli_municipio,
                    cli.cli_telefones,
                    cli.cli_prazo,
                    cli.cli_fornecedor,
                    cli.cli_cliente,
                    cli.cli_nfe,
                    cli.cli_ativo,
                    cli.ven_codigo
                    from cli cli 
                    order by cli.cli_codigo";
        }

    public static function CREATE() 
        {
            return "insert into cli 
                    (cli_nome, cli_razao, cli_cnpjcpf, cli_ie, cli_im, cli_endereco, cli_numero, cli_bairro, cli_cep, cli_uf, cli_municipio, cli_telefones, cli_prazo, cli_fornecedor, cli_cliente, cli_nfe, cli_ativo, ven_codigo)
                    values 
                    (
                        :CLI_NOME,
                        :CLI_RAZAO,
                        :CLI_CNPJCPF,
                        :CLI_IE,    
                        :CLI_IM,
                        :CLI_ENDERECO,
                        :CLI_NUMERO,
                        :CLI_BAIRRO,
                        :CLI_CEP,
                        :CLI_UF,
                        :CLI_MUNICIPIO,
                        :CLI_TELEFONES,
                        :CLI_PRAZO,
                        :CLI_FORNECEDOR,
                        :CLI_CLIENTE,
                        :CLI_NFE,
                        :CLI_ATIVO,
                        :VEN_CODIGO
                    )";
                       
        }    
    public static function UPDATE() 
        {
            return "update cli set
                    cli_nome = :CLI_NOME,
                    cli_razao = :CLI_RAZAO,
                    cli_cnpjcpf = :CLI_CNPJCPF,
                    cli_ie = :CLI_IE,
                    cli_im = :CLI_IM,
                    cli_endereco = :CLI_ENDERECO,
                    cli_numero = :CLI_NUMERO,
                    cli_bairro = :CLI_BAIRRO,
                    cli_cep = :CLI_CEP,
                    cli_uf = :CLI_UF,
                    cli_municipio = :CLI_MUNICIPIO,
                    cli_telefones = :CLI_TELEFONES,
                    cli_prazo = :CLI_PRAZO,
                    cli_fornecedor = :CLI_FORNECEDOR,
                    cli_cliente = :CLI_CLIENTE,
                    cli_nfe = :CLI_NFE,
                    cli_ativo = :CLI_ATIVO,
                    ven_codigo = :VEN_CODIGO
                    where cli_codigo = :CLI_CODIGO";
                 
        }    
    public static function DELETE() 
        {
            return "delete from cli 
                    where cli_codigo = :CLI_CODIGO"; 
        }    

}



?>