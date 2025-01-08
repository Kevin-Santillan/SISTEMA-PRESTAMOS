<?php
    require_once "mainModel.php";

    class loginModelo extends mainModel{
        protected static function iniciar_sesion_model($data_user){
            $sql = "SELECT * FROM _usuario WHERE usuario_usuario = $1 AND usuario_clave = $2 AND usuario_estado = $3";
            
            $valores = [
                $data_user['usuario'], 
                $data_user['clave'],
                'activo'
            ];
             try {
                $resultado = self::ejecutar_consulta_con_parametro($sql,$valores);
                if ($resultado) {
                    return pg_fetch_assoc($resultado);
                }
             } catch (Exception $e) {
            
                error_log("Error al ingresar: " . $e->getMessage());
                return false;  
            }
            

        }
    }