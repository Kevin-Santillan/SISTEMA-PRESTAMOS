<?php

if ($peticionesAjax) {
    require_once "../config/SERVER.php";
} else {
    require_once "./config/SERVER.php";
}
require_once "conexion.php";

class mainModel extends conexion {

    // protected static function ejecutar_consulta($consulta){
    //     $sql = self :: conectar()->prepare($consulta);
    //     $sql->execute();
    //     return $conexion;
    // }

    public static function ejecutar_consulta_con_parametro($consulta, $valores) {
        $conexion = self::conectar();  

        if ($conexion === null) {
            return false; 
        }

        $result = pg_query_params($conexion, $consulta, $valores);

        if ($result === false) {
            error_log("Error al ejecutar la consulta: " . pg_last_error($conexion));
            return false;
        }

        return $result; 
    }

    public static function cerrar_conexion() {
        conexion::cerrar_conexion();
    }

    protected static function limpiar_cadena($cadena) {
        $cadena = trim($cadena);
        $cadena = stripcslashes($cadena);
        $cadena = preg_replace("/<script.*?>.*?<\/script>/si", "", $cadena); // Eliminar scripts
        $cadena = preg_replace("/SELECT.*FROM|DELETE.*FROM|INSERT.*INTO|DROP.*TABLE|DROP.*DATABASE|TRUNCATE.*TABLE|SHOW.*TABLES|SHOW.*DATABASES|--|;/i", "", $cadena); // Eliminar posibles consultas
        return $cadena;
    }

    
    protected static function verificar_datos($filtro, $cadena) {
        if (preg_match("/^".$filtro."$/", $cadena)) {
            return false;
        } else {
            return true;
        }
    }

    
    protected static function verificar_fecha($fecha) {
        $valores = explode("-", $fecha);
        if(count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])) {
            return false;
        } else {
            return true;
        }
    }

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
