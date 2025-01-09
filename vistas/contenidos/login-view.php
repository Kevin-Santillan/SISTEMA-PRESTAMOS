<div class="login-container">
	<div class="login-content">
		<p class="text-center">
			<i class="fas fa-user-circle fa-5x"></i>
    	</p>
		<p class="text-center">
			Inicia sesión con tu cuenta
		</p>
		<form action="" method="POST" autocomplete="off" >
			<div class="form-group">
				<label for="UserName" class="bmd-label-floating"><i class="fas fa-user-secret"></i> &nbsp;    Usuario</label>
				<input type="text" class="form-control" id="UserName" name="usuario_login"  maxlength="35" required oninput="numeroletra(this)">
			</div>
			<div class="form-group">
				<label for="UserPassword" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp; Contraseña</label>
				<input type="password" class="form-control" id="UserPassword" name="clave_login"  maxlength="100" required oninput="contra(this)">
			</div>
			<button type="submit" class="btn-login text-center">LOG IN</button>
		</form>
	</div>
</div>

<?php

	if (isset($_POST['usuario_login']) && isset($_POST['clave_login'])) {
		require_once "./controladores/loginController.php";
		$instancia= new loginController();
		echo $instancia->iniciar_sesion_controller();
	}

?>