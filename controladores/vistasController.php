<?php
    require_once "./modelos/vistasModelo.php";

    class vistasController extends vistasModelo{

        // controlador para obtener plantilla
        public function obt_plantilla_controlador(){
            return require_once "./vistas/plantilla.php";
        }
        // controlador para obtener vistas
        public function obt_vistas_controlador(){
            if(isset($_GET['views'])){
                $ruta = explode("/",$_GET['views']);
                $respuesta=vistasModelo::obt_vistas_modelo($ruta[0]);
            }else{
                $respuesta="login";
            }
            return $respuesta;
        }

    };