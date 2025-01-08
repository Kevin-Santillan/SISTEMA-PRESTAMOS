<?php
    if ($peticionesAjax) {
        require_once "../modelos/loginModelo.php";
    }else{
        require_once "./modelos/loginModelo.php";
    }

    class loginController extends loginModelo{
        
    }