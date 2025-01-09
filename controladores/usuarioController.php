<?php

if ($peticionesAjax) {
    require_once "../modelos/usuarioModelo.php";
} else {
    require_once "./modelos/usuarioModelo.php";
}

class usuarioController extends usuarioModelo {
    
    public static function agregar_usuario_controller() {

        $dni = mainModel::limpiar_cadena($_POST['usuario_dni_reg']);
        $nombre = mainModel::limpiar_cadena($_POST['usuario_nombre_reg']);
        $apellido = mainModel::limpiar_cadena($_POST['usuario_apellido_reg']);
        $telefono = mainModel::limpiar_cadena($_POST['usuario_telefono_reg']);
        $direccion = mainModel::limpiar_cadena($_POST['usuario_direccion_reg']);

        $usuario = mainModel::limpiar_cadena($_POST['usuario_usuario_reg']);
        $email = mainModel::limpiar_cadena($_POST['usuario_email_reg']);
        $clave1 = mainModel::limpiar_cadena($_POST['usuario_clave_1_reg']);
        $clave2 = mainModel::limpiar_cadena($_POST['usuario_clave_2_reg']);

        $estado = "activo";

        $privilegio = mainModel::limpiar_cadena($_POST['usuario_privilegio_reg']);

        if ($dni=="" || $nombre=="" ||$apellido=="" ||$usuario=="" ||$clave1=="" || $clave2 ==""){
            $alerta=[
                "Alerta" => "simple",
                "Titulo" => "OCURRIÓ UN ERROR INESPERADO",
                "Texto" => "no has llenado los campos que son obligatorios",
                "Tipo" => "error",
            ];
            echo json_encode($alerta);
            exit();
        }

        //VERIFICAR DNI 
        if (mainModel::verificar_datos("[0-9]{8}",$dni)){
            $alerta=[
                "Alerta" => "simple",
                "Titulo" => "ERROR INESPERADO EN EL DNI",
                "Texto" => "los datos ingresados deben cumplir los requisitos solicitados",
                "Tipo" => "error",
            ];
            echo json_encode($alerta);
            exit();
        }
        $check_dni = mainModel::ejecutar_consulta_con_parametro("SELECT usuario_dni FROM _usuario WHERE usuario_dni=$1", [$dni]);

        if (pg_num_rows($check_dni) > 0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "ERROR AL AGREGAR EL DNI",
                "Texto" => "El DNI ingresado ya se encuentra registrado",
                "Tipo" => "error",
            ];
            echo json_encode($alerta);
            exit();
        }

        //VERIFICAR NOMBRE
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,35}",$nombre)){
            $alerta=[
                "Alerta" => "simple",
                "Titulo" => "ERROR INESPERADO EN EL NOMBRE",
                "Texto" => "los datos ingresados deben cumplir los requisitos solicitados",
                "Tipo" => "error",
            ];
            echo json_encode($alerta);
            exit();
        }

        //VERIFICAR APELLIDO
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,35}",$apellido)){
            $alerta=[
                "Alerta" => "simple",
                "Titulo" => "ERROR INESPERADO APELLIDO",
                "Texto" => "los datos ingresados deben cumplir los requisitos solicitados",
                "Tipo" => "error",
            ];
            echo json_encode($alerta);
            exit();
        }

        //VERIFICAR TELEFONO
        if (mainModel::verificar_datos("[0-9]{9}",$telefono)){
            $alerta=[
                "Alerta" => "simple",
                "Titulo" => "ERROR INESPERADO EN EL TELEFONO",
                "Texto" => "los datos ingresados deben cumplir los requisitos solicitados",
                "Tipo" => "error",
            ];
            echo json_encode($alerta);
            exit();
        }

        //VERIFICAR DIRECCION
        if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{8,190}",$direccion)){
            $alerta=[
                "Alerta" => "simple",
                "Titulo" => "ERROR INESPERADO EN DIRECCION",
                "Texto" => "los datos ingresados deben cumplir los requisitos solicitados",
                "Tipo" => "error",
            ];
            echo json_encode($alerta);
            exit();
        }

        //VERIFICAR USUARIO
        if (mainModel::verificar_datos("[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,30}",$usuario)){
            $alerta=[
                "Alerta" => "simple",
                "Titulo" => "ERROR INESPERADO EN EL USUARIO",
                "Texto" => "los datos ingresados deben cumplir los requisitos solicitados",
                "Tipo" => "error",
            ];
            echo json_encode($alerta);
            exit();
        }

        //VERIFICAR EMAIL
        // if (mainModel::verificar_datos("[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,30}",$email)){
        //     $alerta=[
        //         "Alerta" => "simple",
        //         "Titulo" => "ERROR INESPERADO EN EL EMAIL",
        //         "Texto" => "los datos ingresados deben cumplir los requisitos solicitados",
        //         "Tipo" => "error",
        //     ];
        //     echo json_encode($alerta);
        //     exit();
        // }

        //VERIFICAR CLAVE
        if (mainModel::verificar_datos("[a-zA-Z0-9$@.-]{5,30}",$clave1)){
            $alerta=[
                "Alerta" => "simple",
                "Titulo" => "ERROR INESPERADO EN EL EMAIL",
                "Texto" => "los datos ingresados deben cumplir los requisitos solicitados",
                "Tipo" => "error",
            ];
            echo json_encode($alerta);
            exit();
        }
        if (mainModel::verificar_datos("[a-zA-Z0-9$@.-]{5,30}",$clave2)){
            $alerta=[
                "Alerta" => "simple",
                "Titulo" => "ERROR INESPERADO EN EL EMAIL",
                "Texto" => "los datos ingresados deben cumplir los requisitos solicitados",
                "Tipo" => "error",
            ];
            echo json_encode($alerta);
            exit();
        }
        
        if ($clave1!==$clave2){
            $alerta=[
                "Alerta" => "simple",
                "Titulo" => "ERROR EN LA CONTRASEÑA",
                "Texto" => "La contraseña no coincide, tiene que coincidir la contraseña",
                "Tipo" => "error",
            ];
            echo json_encode($alerta);
            exit();
        }else{
            $clave = mainModel::encryption($clave1); 
        }
        
        //GUARDAR DATOS EN UN ARRAY
        $data = [
            "dni" => $dni,
            "nombre" => $nombre,
            "apellido" => $apellido,
            "telefono" => $telefono,
            "direccion" => $direccion,
            "email" => $email,
            "usuario" => $usuario,
            "clave" => $clave,
            "estado" => $estado,            
            "privilegio" => $privilegio
        ];
        $resultado = self::agregar_usuario_model($data);


        if ($resultado) {
            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "USUARIO AGREGADO",
                "Texto" => "El usuario ha sido registrado correctamente",
                "Tipo" => "success",
            ];
            echo json_encode($alerta);
            exit();
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "ERROR AL AGREGAR EL USUARIO",
                "Texto" => "Hubo un problema al agregar el usuario. Intenta nuevamente",
                "Tipo" => "error",
            ];
            echo json_encode($alerta);
            exit();
        }


    }

    public static function listar_usuario_controller()  {
        $usuario = self::listar_usuario_model();
        // var_dump($usuario); 
        return json_encode($usuario);
    }
   

}