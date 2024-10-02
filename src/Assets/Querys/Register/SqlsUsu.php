<?php
namespace ControllerApi\Server\Assets\Querys\Register;

class SqlsUsu 
{
    public static function READ() 
        {
            return "select
                    usu.usu_nome,
                    usu.usu_senha,
                    usu.usu_nivel,
                    usu.usu_ativo,
                    usu.emp_codigo
                    from usu usu 
                    where emp_codigo = :EMP_CODIGO and usu_nome <> :USU_NOME";
        }

    public static function CREATE() 
        {
            return "insert into usu 
                    (usu_nome, usu_senha,usu_nivel, usu_ativo, emp_codigo)
                    values 
                    ( 
                        :USU_NOME,
                        :USU_SENHA,
                        :USU_NIVEL,
                        :USU_ATIVO,
                        :EMP_CODIGO
                    )";
        }    
    public static function UPDATE() 
        {
            return "update usu set
                    usu_senha = :USU_SENHA,
                    usu_nivel = :USU_NIVEL,
                    usu_ativo = :USU_ATIVO
                    where usu_nome = :USU_NOME and 
                    emp_codigo = :EMP_CODIGO";

        } 
        
    public static function PASSWORD() 
        {
            return "update usu set
                    usu_senha = :USU_SENHA 
                    where usu_nome = :USU_NOME and emp_codigo = :EMP_CODIGO";
        }     
    public static function DELETE() 
        {
            return "delete from usu where usu_nome = :USU_NOME and emp_codigo = :EMP_CODIGO";
        }    

}



?>