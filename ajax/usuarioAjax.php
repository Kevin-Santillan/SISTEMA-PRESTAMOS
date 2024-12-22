
<?php

$peticionesAjax=true;
require_once "../config/APP.php";

if ($_POST['usuario_dni_reg']){

    /*-------------- INTANCIA AL CONTROLADOR  --------------*/
    require_once "../controladores/usuarioController.php";
    $ins_usuario = new usuarioController();

    if (isset($_POST['usuario_dni_reg'] ) && isset($_POST['usuario_nombre_reg'])) {
        echo $ins_usuario->agregar_usuario_controller();
    }

}else{
    session_start(['name'=>'SISPRES']);
    session_unset();
    session_destroy();
    header("Location:".SERVERURL."login/");
    exit();
    
}