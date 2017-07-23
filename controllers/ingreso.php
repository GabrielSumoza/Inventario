<?php

class Ingreso{

	public function ingresoController(){

		if(isset($_POST["usuarioIngreso"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"])&&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"])){

			   	$encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array("usuario"=>$_POST["usuarioIngreso"],
					"password"=>$encriptar);

			@$respuesta = IngresoModels::ingresoModel($datosController, "vg_usuarios");

			$intentos = $respuesta["intentos"];
			$usuarioActual = $_POST["usuarioIngreso"];
			$maximoIntentos = 2;

			if($intentos < $maximoIntentos){

				if($respuesta["name_user"] == $_POST["usuarioIngreso"] && $respuesta["pass"] == $encriptar && $respuesta["status"]==1){

					$intentos = 0;

					$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

					@$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "vg_usuarios");

					session_start();

					$_SESSION["validar"] = true;
					$_SESSION["usuario"] = $respuesta["name_user"];
					$_SESSION["pag"]= null;

					if ($respuesta["permisos"] == "admin"){
						header("location:admin\inicio");
					}elseif ($respuesta["permisos"] == "user") {
						header("location:user\inicio");
					}else{
						echo '<div class="alert alert-danger">Error al ingresar</div>';
					}
				}

				else{

					if($respuesta["status"]==0){
						echo '<div class="alert alert-danger">Usuario Inactivo</div>';
					}else{
						++$intentos;

						$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

						@$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "vg_usuarios");

						echo '<div class="alert alert-danger">Error al ingresar</div>';
					} 



				}

			}

			else{

				$intentos = 0;

				$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

				@$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "vg_usuarios");

				echo '<div class="alert alert-danger">Ha fallado 3 veces, demuestre que no es un robot</div>';

			}

		}

	}
}

}