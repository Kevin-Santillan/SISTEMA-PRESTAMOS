<?php

if ($peticionesAjax) {
    require_once "../config/SERVER.php";
} else {
    require_once "./config/SERVER.php";
}
require_once "conexion.php";

class mainModel extends Conexion {

    // Constructor para establecer la conexión
    public function __construct() {
        $this->conexion = new Conexion();  // Crear una nueva instancia de Conexion
        $this->conexion = $this->conexion->conect();  // Obtener la conexión a PostgreSQL
    }

    // Ejecutar consulta con parámetros para evitar inyección SQL
    protected function ejecutar_consulta_con_parametro($consulta, $valores) {
        // Verificar si la conexión es válida
        if ($this->conexion === null) {
            return false; // Si no hay conexión, retornar false
        }

        // Ejecutar la consulta con los parámetros utilizando pg_query_params
        $result = pg_query_params($this->conexion, $consulta, $valores);

        // Verificar si la consulta fue exitosa
        if ($result === false) {
            error_log("Error al ejecutar la consulta: " . pg_last_error($this->conexion));
            return false;
        }

        return $result; // Retornar el resultado de la consulta
    }

    // Método para cerrar la conexión (opcional)
    public function cerrar_conexion() {
        pg_close($this->conexion);  // Cerrar la conexión a la base de datos
    }

    // Método para limpiar cadenas
    protected static function limpiar_cadena($cadena) {
        $cadena = trim($cadena);
        $cadena = stripcslashes($cadena);
        $cadena = preg_replace("/<script.*?>.*?<\/script>/si", "", $cadena); // Eliminar scripts
        $cadena = preg_replace("/SELECT.*FROM|DELETE.*FROM|INSERT.*INTO|DROP.*TABLE|DROP.*DATABASE|TRUNCATE.*TABLE|SHOW.*TABLES|SHOW.*DATABASES|--|;/i", "", $cadena); // Eliminar posibles consultas
        return $cadena;
    }

    // Verificar datos con expresiones regulares
    protected static function verificar_datos($filtro, $cadena) {
        if (preg_match("/^".$filtro."$/", $cadena)) {
            return false;
        } else {
            return true;
        }
    }

    // Verificar fecha con formato YYYY-MM-DD
    protected static function verificar_fecha($fecha) {
        $valores = explode("-", $fecha);
        if(count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])) {
            return false;
        } else {
            return true;
        }
    }

    // Método para paginación de tablas
    protected static function paginador_tablas($pagina, $Npaginas, $url, $botones) {
        $tabla = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';

        if ($pagina == 1) {
            $tabla .= '<li class="page-item disabled">
                        <a class="page-link">
                            <i class="fa-regular fa-circle-left"></i>
                        </a>
                    </li>';
        } else {
            $tabla .= '<li class="page-item disabled">
                        <a class="page-link" href="'.$url.'1/">
                            <i class="fa-regular fa-circle-left"></i>
                        </a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="'.$url.($pagina-1).'/">
                            Anterior
                        </a>
                    </li>';
        }

        $ciclo = 0;
        for($i = $pagina; $i <= $Npaginas; $i++) {
            if ($ciclo >= $botones) {
                break;
            }

            if ($pagina == $i) {
                $tabla .= '<li class="page-item">
                            <a class="page-link active" href="'.$url.$i.'/">'.$i.'</a>
                        </li>';
            } else {
                $tabla .= '<li class="page-item">
                            <a class="page-link" href="'.$url.$i.'/">'.$i.'</a>
                        </li>';
            }
            $ciclo++;
        }

        if ($pagina == $Npaginas) {
            $tabla .= '<li class="page-item disabled">
                        <a class="page-link">
                            <i class="fa-regular fa-circle-right"></i>
                        </a>
                    </li>';
        } else {
            $tabla .= '<li class="page-item disabled">
                        <a class="page-link" href="'.$url.($pagina+1).'/">
                            Siguiente
                        </a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="'.$url.$Npaginas.'/">
                            <i class="fa-regular fa-circle-right"></i>
                        </a>
                    </li>';
        }

        $tabla .= '</ul></nav>';
        return $tabla;
    }
}
?>
