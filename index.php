<?php


require_once "./config/APP.php";
require_once "./controladores/vistasController.php";

// aqui inicializa el proyecto de prestamos

$plantilla = new vistasController();
$plantilla->obt_plantilla_controlador();