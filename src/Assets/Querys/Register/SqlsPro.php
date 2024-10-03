<?php
namespace ControllerApi\Server\Assets\Querys\Register;

class SqlsPro 
{
    public static function READ() 
        {
            return "select 
                    pro.pro_codigo,  
                    pro.pro_nome, 
                    pro.pro_valor, 
                    pro.pro_unidade, 
                    pro.pro_tipo,
                    pro.pro_estoque, 
                    pro.pro_ativo 
                    from pro pro 
                    order by pro.pro_codigo";
        }

    public static function CREATE() 
        {
            return "insert into pro 
                    (pro_nome, pro_valor, pro_unidade, pro_tipo, pro_estoque, pro_ativo)
                    values 
                    (
                        :PRO_NOME,
                        :PRO_VALOR,
                        :PRO_UNIDADE,
                        :PRO_TIPO,
                        :PRO_ESTOQUE,
                        :PRO_ATIVO
                    )";
        }    
    public static function UPDATE() 
        {
            return "update pro set
                    pro_nome = :PRO_NOME, 
                    pro_valor = :PRO_VALOR, 
                    pro_unidade = :PRO_UNIDADE, 
                    pro_tipo = :PRO_TIPO,
                    pro_estoque = :PRO_ESTOQUE, 
                    pro_ativo = :PRO_ATIVO
                    where pro_codigo = :PRO_CODIGO";

        }    
    public static function DELETE() 
        {
            return "delete from pro 
                    where pro_codigo = :PRO_CODIGO";
        }    

}



?>