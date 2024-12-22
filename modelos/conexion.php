<?php

if ($peticionesAjax) {
    require_once "../config/SERVER.php";
} else {
    require_once "./config/SERVER.php";
}

class Conexion {
    private $conect;

    public function __construct() {
        try {
            // Usar la constante SGBD que ya contiene toda la cadena de conexión
            $this->conect = pg_connect(SGBD);
            if (!$this->conect) {
                throw new Exception("Error de conexión a la base de datos.");
            }
        } catch (Exception $e) {
            $this->conect = 'Error de conexión';
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function conect() {
        return $this->conect;
    }
}
?>
