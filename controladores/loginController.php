<?php
    if ($peticionesAjax) {
        require_once "../modelos/loginModelo.php";
    }else{
        require_once "./modelos/loginModelo.php";
    }

    class loginController extends loginModelo{
        
        public function iniciar_sesion_controller(){
            $usuario=mainModel::limpiar_cadena($_POST['usuario_login']);
            $clave=mainModel::limpiar_cadena($_POST['clave_login']);
        
            if($usuario == "" || $clave == ""){
                echo '
                <script>
                    Swal.fire({
                        title: "OCURRIÓ UN ERROR",
                        text: "DATOS NO COMPLETADOS",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
                exit();
            }
            if (mainModel::verificar_datos("[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,30}",$usuario)){
                echo '
                <script>
                    Swal.fire({
                        title: "OCURRIÓ UN ERROR",
                        text: "Ingrese caracteres correctos en el USUARIO",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
                exit();
            }

            if (mainModel::verificar_datos("[a-zA-Z0-9$@.-]{5,30}",$clave)){
                echo '
                <script>
                    Swal.fire({
                        title: "OCURRIÓ UN ERROR",
                        text: "Ingrese caracteres correctos en la CONTRASEÑA",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
                exit();
            }
            $clave = mainModel::encryption($clave);

            $datos_login = [
                "usuario" => $usuario,
                "clave" => $clave
            ];

            $datos_cuenta = loginModelo::iniciar_sesion_model($datos_login);

            if($datos_cuenta){

                session_start(['name'=>'SISPRES']);
                $_SESSION['id_sispres'] = $datos_cuenta['usuario_id'];
                $_SESSION['nombre_sispres'] = $datos_cuenta['usuario_nombre'];
                $_SESSION['apellido_sispres'] = $datos_cuenta['usuario_apellido'];
                $_SESSION['usuario_sispres'] = $datos_cuenta['usuario_usuario'];
                $_SESSION['privilegio_sispres'] = $datos_cuenta['usuario_privilegio'];
                $_SESSION['token_sispres'] = md5(uniqid(mt_rand(),true));
                return header("Location:".SERVERURL."home/");

            }else{
                echo'
                <script>
                    Swal.fire({
                        title: "OCURRIÓ UN ERROR",
                        text: " Usuario o Clave son incorrectos",
                        type: "error",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
            }


        }
        
    }