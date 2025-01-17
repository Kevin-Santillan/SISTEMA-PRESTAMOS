<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo COMPANY;?></title>

	<?php require "inc/Link.php";?>

</head>
<body>

	<?php
		$peticionesAjax = false;
		require_once "./controladores/vistasController.php";
		$IV = new vistasController ();
		$vistas = $IV->obt_vistas_controlador();

		if($vistas =="login" || $vistas =="404"){
			require_once "./vistas/contenidos/".$vistas."-view.php";
		}else{
            session_start(['name'=>'SISPRES']);
			require_once "./controladores/loginController.php";
			$lc = new loginController();
			if (!isset($_SESSION['token_sispres']) || !isset($_SESSION['id_sispres']) || !isset($_SESSION['usuario_sispres']) || !isset($_SESSION['privilegio_sispres'])) {
				echo $lc->cerrar_sesion_controller();
				exit();
			}
	?>
	<!-- Main container -->
	<main class="full-box main-container">

		<!-- Nav lateral -->
		<?php include "./vistas/inc/NavLateral.php"; ?>

		<!-- Page content -->
		<section class="full-box page-content">
            <?php 
				include "inc/NavBar.php"; 
				include $vistas;
			?>
        </section>

	</main>

	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<?php 
			include "./vistas/inc/logOut.php";
		}
		include "./vistas/inc/Script.php";
	?>

</body>
</html>