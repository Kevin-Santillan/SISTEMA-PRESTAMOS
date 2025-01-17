<?php
    $peticionesAjax=true;
    require_once "../config/APP.php";

    if(isset($_POST['token']) && isset($_POST['usuario'])){
        require_once "../controladores/loginController.php";
        $cerrarsesion = new loginController();
        echo $cerrarsesion->boton_cerrar_sesion();
    }else{
    session_start(['name'=>'SISPRES']);
    session_unset();
    session_destroy();
    header("Location:".SERVERURL."login/");
    exit();
    }