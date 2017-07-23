<?php

require_once "conexion.php";

class TiendaModels{

	public function tiendaModel($datosModel, $tabla){


		$stmt = Conexion::conectar()->prepare("SELECT COUNT(vg_cod)as canTienda FROM $tabla WHERE vg_id_tienda = :codTienda ORDER by vg_cod");

		$stmt -> bindParam(":codTienda", $datosModel["codTienda"], PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt->fetch();

		$stmt -> close();

	}

	public function mostrarTiendaModel($datosModel, $tabla,$maximo,$inicio){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE vg_id_tienda = :codTienda ORDER by vg_cod LIMIT $maximo OFFSET $inicio");

		$stmt -> bindParam(":codTienda", $datosModel["codTienda"], PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchall();

		$stmt -> close();

	}
 
	public function mostrarBusModel($datosModel, $tabla){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM vg_inv WHERE vg_id_tienda = :codTienda and (lower(vg_cod) like  lower(concat('%',:bus,'%')) or lower(vg_tipo_prenda) like  lower(concat('%',:bus,'%')) or lower(vg_tipo_oro) like  lower(concat('%',:bus,'%'))or lower(vg_descripcion) like  lower(concat('%',:bus,'%'))) ORDER by vg_cod");

		$stmt -> bindParam(":codTienda", $datosModel["codTienda"], PDO::PARAM_STR);
		$stmt -> bindParam(":bus", $datosModel["bus"], PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchall();

		$stmt -> close();

	}


	public function eliminarTiendaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE vg_cod = :codi_elimi and vg_id_tienda = :cod_tienda");

		$stmt -> bindParam(":codi_elimi", $datosModel["codi_elimi"], PDO::PARAM_STR);
		$stmt -> bindParam(":cod_tienda", $datosModel["codTienda"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}

		else{

			return "error";
		}

	}

	public function actualTiendaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET vg_cod = :vg_cod, vg_tipo_prenda = :vg_tipo_prenda,vg_tipo_oro = :vg_tipo_oro,vg_descripcion = :vg_descripcion,vg_peso = :vg_peso,vg_brillante = :vg_brillante,vg_precio = :vg_precio,vg_fecha = :vg_fecha, img_name = :img_name WHERE id_inv = :id_inv and vg_id_tienda = :cod_tienda");

		$stmt -> bindParam(":vg_cod", $datosModel["vg_cod"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_tipo_prenda", $datosModel["vg_tipo_prenda"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_tipo_oro", $datosModel["vg_tipo_oro"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_descripcion", $datosModel["vg_descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_peso", $datosModel["vg_peso"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_brillante", $datosModel["vg_brillante"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_precio", $datosModel["vg_precio"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_fecha", $datosModel["vg_fecha"], PDO::PARAM_STR);
		$stmt -> bindParam(":img_name", $datosModel["img_name"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_inv", $datosModel["id_inv"], PDO::PARAM_STR);
		$stmt -> bindParam(":cod_tienda", $datosModel["codTienda"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		}

		else{

			return "error";
		}

	}

	public function ingresarTiendaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO vg_inv(vg_cod, vg_tipo_prenda, vg_tipo_oro, vg_descripcion, vg_peso, vg_brillante, vg_precio, vg_fecha, img_name, vg_id_tienda) VALUES (:vg_cod, :vg_tipo_prenda, :vg_tipo_oro, :vg_descripcion, :vg_peso, :vg_brillante, :vg_precio, :vg_fecha, :img_name, :cod_tienda)");
		echo "";
		$stmt -> bindParam(":vg_cod", $datosModel["vg_cod"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_tipo_prenda", $datosModel["vg_tipo_prenda"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_tipo_oro", $datosModel["vg_tipo_oro"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_descripcion", $datosModel["vg_descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_peso", $datosModel["vg_peso"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_brillante", $datosModel["vg_brillante"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_precio", $datosModel["vg_precio"], PDO::PARAM_STR);
		$stmt -> bindParam(":vg_fecha", $datosModel["vg_fecha"], PDO::PARAM_STR);
		$stmt -> bindParam(":img_name", $datosModel["img_name"], PDO::PARAM_STR);
		$stmt -> bindParam(":cod_tienda", $datosModel["codTienda"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		}

		else{

			return "error";
		}

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