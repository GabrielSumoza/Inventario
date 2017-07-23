<?php

require_once "conexion.php";

class TiendaModels{

	public function tiendaModel($datosModel, $tabla){




		$stmt = Conexion::conectar()->prepare("SELECT COUNT(vg_cod)as canTienda FROM vg_inv WHERE vg_id_tienda = :codTienda ORDER by vg_cod");

		$stmt -> bindParam(":codTienda", $datosModel["codTienda"], PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}
}






class IngresoModels{

	public function ingresoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT name_user, pass, intentos FROM $tabla WHERE name_user = :usuario");

		$stmt -> bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}

	public function intentosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE name_user = :usuario");

		$stmt -> bindParam(":intentos", $datosModel["actualizarIntentos"], PDO::PARAM_INT);
		$stmt -> bindParam(":usuario", $datosModel["usuarioActual"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}

		else{

			return "error";
		}

	}

}