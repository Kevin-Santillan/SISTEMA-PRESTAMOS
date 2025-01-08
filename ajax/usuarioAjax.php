
<?php

$peticionesAjax=true;
require_once "../config/APP.php";

if (isset($_POST['usuario_dni_reg'])){

    /*-------------- INTANCIA AL CONTROLADOR  --------------*/
    require_once "../controladores/usuarioController.php";
    $ins_usuario = new usuarioController();

    if (isset($_POST['usuario_dni_reg'] ) && isset($_POST['usuario_nombre_reg'])) {
        echo $ins_usuario->agregar_usuario_controller();
    }  
}elseif (isset($_GET['action']) && $_GET['action'] === "list"){
    require_once "../controladores/usuarioController.php";
    $ins_usuario = new usuarioController();
    echo $ins_usuario->listar_usuario_controller();

}else{
    session_start(['name'=>'SISPRES']);
    session_unset();
    session_destroy();
    header("Location:".SERVERURL."login/");
    exit();
    
}
