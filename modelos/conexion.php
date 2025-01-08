<?php

if ($peticionesAjax) {
    require_once "../config/SERVER.php";
} else {
    require_once "./config/SERVER.php";
}

class conexion {
    private static $conect = null; 
    public static function conectar() {
        if (self::$conect === null) {
            try {
                self::$conect = pg_connect(SGBD);
                if (!self::$conect) {
                    throw new Exception("Error de conexión a la base de datos.");
                }
            } catch (Exception $e) {
                self::$conect = null;
                error_log("ERROR: " . $e->getMessage());
                echo "ERROR: " . $e->getMessage();
            }
        }
        return self::$conect;
    }

   
    public static function cerrar_conexion() {
        if (self::$conect !== null) {
            pg_close(self::$conect); 
            self::$conect = null; 
        }
    }
}
?>

