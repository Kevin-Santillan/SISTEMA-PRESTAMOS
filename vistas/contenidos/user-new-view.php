<?php
     if ($_SESSION['privilegio_sispres']!=1) {
        echo $lc->cerrar_sesion_controller();
        exit();
    }
?>
<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO
    </h3>
    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit nostrum rerum animi natus beatae ex. Culpa blanditiis tempore amet alias placeat, obcaecati quaerat ullam, sunt est, odio aut veniam ratione.
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="<?php echo SERVERURL?>user-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL?>user-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL?>user-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
        </li>
    </ul>	
</div>

<!-- Content -->
<div class="container-fluid">
    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" method="POST" data-form="save" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12 col-md-4">
                        <div class="form-group bmd-form-group">
                            <label for="usuario_dni" class="bmd-label-floating">DNI</label>
                            <input type="text" class="form-control" name="usuario_dni_reg" id="usuario_dni" maxlength="8" required oninput="numero(this)"/>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="usuario_nombre" class="bmd-label-floating">Nombres</label>
                            <input type="text" class="form-control" name="usuario_nombre_reg" id="usuario_nombre" maxlength="35" required oninput="letra(this)">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="usuario_apellido" class="bmd-label-floating">Apellidos</label>
                            <input type="text" class="form-control" name="usuario_apellido_reg" id="usuario_apellido" maxlength="35" required oninput="letra(this)">
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_telefono" class="bmd-label-floating">Teléfono</label>
                            <input type="text" class="form-control" name="usuario_telefono_reg" id="usuario_telefono" maxlength="9" required oninput="numero(this)"/>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_direccion" class="bmd-label-floating">Dirección</label>
                            <input type="text" class="form-control" name="usuario_direccion_reg" id="usuario_direccion" maxlength="190" oninput="direccion(this)">
                        </div>
                    </div>
                
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <fieldset>
            <legend><i class="fas fa-user-lock"></i> &nbsp; Información de la cuenta</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_usuario" class="bmd-label-floating">Nombre de usuario</label>
                            <input type="text" class="form-control" name="usuario_usuario_reg" id="usuario_usuario" maxlength="35" required oninput="numeroletra(this)"/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_email" class="bmd-label-floating">Email</label>
                            <input type="email" class="form-control" name="usuario_email_reg" id="usuario_email" maxlength="70" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_clave_1" class="bmd-label-floating">Contraseña</label>
                            <input type="password" class="form-control" name="usuario_clave_1_reg" id="usuario_clave_1" maxlength="100" required oninput="contra(this)">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_clave_2" class="bmd-label-floating">Repetir contraseña</label>
                            <input type="password" class="form-control" name="usuario_clave_2_reg" id="usuario_clave_2" maxlength="100" required oninput="contra(this)" >
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <fieldset>
            <legend><i class="fas fa-medal"></i> &nbsp; Nivel de privilegio</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <p><span class="badge badge-info">Control total</span> Permisos para registrar, actualizar y eliminar</p>
                        <p><span class="badge badge-success">Edición</span> Permisos para registrar y actualizar</p>
                        <p><span class="badge badge-dark">Registrar</span> Solo permisos para registrar</p>
                        <div class="form-group">
                            <select class="form-control" name="usuario_privilegio_reg">
                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                <option value="1">Control total</option>
                                <option value="2">Edición</option>
                                <option value="3">Registrar</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
        </p>
    </form>
</div>

<!-- <script>
    function consultarDni(dni) {
    // Verifica que el DNI tenga 8 dígitos
        if (dni.length === 8) {
            // Llamada a la API
            fetch(`https://apidni.com/api/v2/dni/${dni}`, {
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer 5325dc36374cf214c04f40dda945320d',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Autocompleta los campos de nombre y apellido
                    document.getElementById('usuario_nombre').value = data.nombres || '';
                    document.getElementById('usuario_apellido').value = `${data.apellido_paterno || ''} ${data.apellido_materno || ''}`.trim();
                } else {
                    alert('DNI no encontrado en la base de datos.');
                }
            })
            .catch(error => {
                console.error('Error al consultar el DNI:', error);
                alert('Ocurrió un error al consultar el DNI.');
            });
        } else {
            // Opcional: Mensaje si el DNI no tiene 8 dígitos
            console.log('DNI incompleto. Debe tener 8 dígitos.');
        }
    }
</script> -->