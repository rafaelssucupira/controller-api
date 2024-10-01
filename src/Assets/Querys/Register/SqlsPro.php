<?php
namespace ControllerApi\Server\Assets\Querys\Register;

class SqlsPro 
{
    public static function READ() 
        {
            return "select 
                    pro.pro_codigo,  
                    pro.pro_descricao, 
                    pro.pro_preco, 
                    pro.pro_unidade, 
                    pro.pro_compra, 
                    pro.pro_vende, 
                    pro.pro_estoque, 
                    pro.pro_ativo 
                    from pro pro 
                    order by pro.pro_codigo";
        }

    public static function CREATE() 
        {
            return "insert into pro 
                    (pro_nome, pro_preco, pro_unidade, pro_compra, pro_vende, pro_estoque, pro_ativo)
                    values 
                    (
                        :PRO_NOME,
                        :PRO_PRECO,
                        :PRO_UNIDADE,
                        :PRO_COMPRA,
                        :PRO_VENDE,
                        :PRO_ESTOQUE,
                        :PRO_ATIVO
                    )";
        }    
    public static function UPDATE() 
        {
            return "update pro set
                    pro_nome = :PRO_NOME, 
                    pro_preco = :PRO_PRECO, 
                    pro_unidade = :PRO_UNIDADE, 
                    pro_compra = :PRO_COMPRA, 
                    pro_vende = :PRO_VENDE, 
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