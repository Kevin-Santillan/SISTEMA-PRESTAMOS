<?php


require_once "./config/APP.php";
require_once "./controladores/vistasController.php";


$plantilla = new vistasController();
$plantilla->obt_plantilla_controlador();