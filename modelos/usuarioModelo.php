<?php

require_once "mainModel.php"; // Incluye la clase principal que extiende Conexion

class usuarioModelo extends mainModel {

    protected static function agregar_usuario_model($data) {
    
        $consulta = "INSERT INTO _usuario (usuario_dni, usuario_nombre, usuario_apellido, usuario_telefono, usuario_direccion, usuario_email, usuario_usuario, usuario_clave, usuario_estado, usuario_privilegio) 
                     VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)";
        

        $valores = [
            $data['dni'],
            $data['nombre'], 
            $data['apellido'],
            $data['telefono'], 
            $data['direccion'],
            $data['email'], 
            $data['usuario'], 
            $data['clave'],
            $data['estado'],
            $data['privilegio'], 
        ];

        try {
            // Ejecutar consulta con parámetros
            $resultado = self::ejecutar_consulta_con_parametro($consulta, $valores);

           
            if ($resultado) {
                return pg_affected_rows($resultado);  
            } else {
                return false; 
            }
        } catch (Exception $e) {
            
            error_log("Error al agregar usuario: " . $e->getMessage());
            return false;  
        }
    }

    protected static function listar_usuario_model(){
        $consulta = "SELECT usuario_dni, usuario_nombre, usuario_apellido, usuario_telefono, usuario_usuario ,usuario_email FROM _usuario ";
        $resultado = self::ejecutar_consulta_con_parametro($consulta,[]);
        return pg_fetch_all($resultado);
    }

}
?>
