<?php

require_once "mainModel.php"; // Incluye la clase principal que extiende Conexion

class usuarioModelo extends mainModel {

    protected static function agregar_usuario_model($data) {
        // Consulta SQL con parámetros posicionales
        $consulta = "INSERT INTO usuarios (usuario_dni, usuario_nombre, usuario_apellido, usuario_telefono, usuario_direccion, usuario_email, usuario_usuario, usuario_clave, usuario_estado, usuario_privilegio) 
                     VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)";

        // Array con valores a insertar
        $valores = [
            $data['dni'], // DNI del usuario
            $data['nombre'], // Nombre del usuario
            $data['apellido'], // Apellido del usuario
            $data['telefono'], // Teléfono del usuario
            $data['direccion'], // Dirección del usuario
            $data['email'], // Correo electrónico del usuario
            $data['usuario'], // Nombre de usuario
            password_hash($data['clave'], PASSWORD_DEFAULT), // Encriptar la clave
            $data['estado'], // Estado del usuario
            $data['privilegio'], // Privilegio del usuario
        ];

        try {
            // Ejecutar consulta con parámetros
            $resultado = self::ejecutar_consulta_con_parametro($consulta, $valores);

            // Verificar si la consulta fue exitosa
            if ($resultado) {
                return pg_affected_rows($resultado);  // Retorna el número de filas afectadas
            } else {
                return false;  // Si hay un error, retornar false
            }
        } catch (Exception $e) {
            // Mejor opción: registrar el error en lugar de 'die'
            error_log("Error al agregar usuario: " . $e->getMessage());
            return false;  // O retornar algún tipo de error controlado
        }
    }

}
?>
