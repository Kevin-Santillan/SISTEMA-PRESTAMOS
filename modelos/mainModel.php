<?php 

// class ConexionPgsql {
//     private static $conexion;

//     public function __construct() {
//         if (!self::$conexion) {
//             $data = "host=" . SERVER . " port=" . DB_PORT . " dbname=" . DB_NAME . " user=" . USER . " password=" . DB_PASSWORD;
//             self::$conexion = pg_connect($data);

//             if (!self::$conexion) {
//                 throw new Exception("Error al conectar a la base de datos: " . pg_last_error());
//             }
//         }
//     }

//     public function ejecutarConsulta($sql, $datos) {
//         $query = pg_query_params(self::$conexion, $sql, $datos);
//         if (!$query) {
//             error_log("Error en la consulta: " . pg_last_error(self::$conexion));
//             return false;
//         }
//         return $query;
//     }

//     public function ejecutarConsultaSimpleFila($sql, $datos) {
//         $query = pg_query_params(self::$conexion, $sql, $datos);
//         if (!$query) {
//             error_log("Error en la consulta: " . pg_last_error(self::$conexion));
//             return false;
//         }
//         return pg_fetch_assoc($query);
//     }
// }

    if ($peticionesAjax) {
        require_once "../config/SERVER.php";
    }else{
        require_once "./config/SERVER.php";
    }

    class mainModel{

        protected static function conectar(){
            try {
                $conexionBD = new PDO(SGBD);
                $conexionBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores
                $conexionBD->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Modo de resultados
                return $conexionBD;
            } catch (PDOException $e) {
                die("Error al conectar con la base de datos: " . $e->getMessage());
            }
        }

        protected static function ejecutar_consulta_simple($consulta,$parametro){
            try {
                $sql = self::conectar()->prepare($consulta);
                $sql->execute($parametros); // Ejecutar con parámetros
                return $sql;
            } catch (PDOException $e) {
                die("Error al ejecutar la consulta: " . $e->getMessage());
            }
        }
    }
