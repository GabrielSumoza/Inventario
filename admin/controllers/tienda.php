<?php

class tiendaControllers{



	public function tiendaController($cod_tienda) {


		$datosController = array("codTienda"=>"$cod_tienda");

		@$respuesta = TiendaModels::tiendaModel($datosController, "vg_inv");

		$intentos = $respuesta["canTienda"];

		return $intentos;
	}

	public function datoTiendaController($cod_tienda,$maximo,$inicio) {

		if(isset($_POST["bus"])){


			$datosController = array("codTienda"=>"$cod_tienda","bus"=>$_POST["bus"]);

			@$respuesta = TiendaModels::mostrarBusModel($datosController, "vg_inv");
			
		}else{

			$datosController = array("codTienda"=>"$cod_tienda");

			@$respuesta = TiendaModels::mostrarTiendaModel($datosController, "vg_inv",$maximo,$inicio);
		}

		foreach ($respuesta as $row => $item){

			echo '	<tr>
			<td>'.$item["vg_cod"].'</td>
			<td>'.$item["vg_tipo_prenda"].'</td>
			<td>'.$item["vg_tipo_oro"].'</td>
			<td>'.$item["vg_descripcion"].'</td>
			<td>'.$item["vg_peso"].'</td>
			<td>'.$item["vg_brillante"].'</td>
			<td>'.$item["vg_precio"].'</td>
			<td>'.$item["vg_fecha"].'</td>
			<td>
				<center>
					<a href="#act'.$item["vg_cod"].'" role="button" class="btn btn-mini" data-toggle="modal" title="Actualizar Informacion">
						<i class="icon-edit"></i>
					</a>
					<a href="#mos'.$item["vg_cod"].'" role="button" class="btn btn-mini" data-toggle="modal" title="Actualizar Informacion">
						<i class="icon-list"></i>
					</a>
				</center>
			</td>
		</tr>

		<div id="act'.$item["vg_cod"].'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
			<div class="modal-example modal-lg" role="document">
				<form name="form1" method="post" action="" class="form-inline" enctype="multipart/form-data">
					<input type="hidden" name="id_inv" value="'.$item["id_inv"].'">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 id="myModalLabel">Articulo Actual</h3>
					</div>
					<div class="modal-body">
						<div class="row-fluid">
							<div class="span6">
								<br><strong>Codigo</strong><br>
								<input type="text" name="vg_cod" autocomplete="off" value="'.$item["vg_cod"].'" ><br>
								<br><strong>Tipo de Oro</strong><br>
								<input type="text" name="vg_tipo_oro" autocomplete="off" value="'.$item["vg_tipo_oro"].'" ><br>
								<br><strong>Peso</strong><br>
								<input type="text" name="vg_peso" autocomplete="off" value="'.$item["vg_peso"].'" ><br>
								<br><strong>Precio</strong><br>
								<input type="text" name="vg_precio" autocomplete="off" value="'.$item["vg_precio"].'" ><br>
							</div>
							<div class="span6">   
								<br><strong>Tipo de prenda</strong><br>
								<input type="text" name="vg_tipo_prenda" autocomplete="off" value="'.$item["vg_tipo_prenda"].'" ><br>
								<br><strong>Descripcion</strong><br>
								<input type="text" name="vg_descripcion" autocomplete="off" value="'.$item["vg_descripcion"].'" ><br>
								<br><strong>Brillantes</strong><br>
								<input type="text" name="vg_brillante" autocomplete="off" value="'.$item["vg_brillante"].'" ><br>
								<br><strong>Fecha de envio</strong><br>
								<input type="date" name="vg_fecha" autocomplete="off" value="'.$item["vg_fecha"].'" ><br>
							</div>
							<div class="span6">  
								<br><p class="help-block">Ingrese la imagen del articulo</p>
								<input name="img_name" type="file" /><br>
								<input type="hidden" name="MAX_FILE_SIZE" value="200000" /><br>
						    </div>
							<div class="span12">';
								$directory="../views/images/articulos";
								$dirint = dir($directory);
								while (($archivo = $dirint->read()) !== false)
								{
									if (preg_match('/gif/', $archivo) || preg_match('/jpg/', $archivo) || preg_match('/png/', $archivo)){
            
										if(preg_match('/'.$item["img_name"].'/',$archivo)){
											echo '<img src="'.$directory."/".$archivo.'">'."\n";
										}
									}
									
								}
								$dirint->close();
							echo '</div>							
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> <strong>Cerrar</strong></button>
						<button type="submit" class="btn btn-primary"><i class="icon-ok"></i> <strong>Actualizar</strong></button>
					</div>
				</form>
			</div>
		</div> 
		<div id="mos'.$item["vg_cod"].'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
			<form name="form1" method="post" action="" class="form-inline">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h3 id="myModalLabel">Imagen Articulo</h3>
				</div>
				<div class="modal-body">
					<div class="row-fluid">
						<div class="span12">
							<center><strong>Codigo del Articulo</strong><br></center>
							<center><input type="text" name="codi_elimi" autocomplete="off" required><br><br></center>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> <strong>Cerrar</strong></button>
					<button type="submit" class="btn btn-danger"><i class="icon-ok"></i> <strong>Eliminar</strong></button>
				</div>
			</form>
		</div>
		';

	}

}

public function crudTiendaController($cod_tienda){
	if(isset($_POST["codi_elimi"])){

		$datosController = array("codi_elimi"=>$_POST["codi_elimi"],"codTienda"=>"$cod_tienda");

		@$respuestaEliminar = TiendaModels::eliminarTiendaModel($datosController, "vg_inv");

		if ($respuestaEliminar == "ok"){						
			echo '<div class="alert alert-success" align="center">
			<button type="button" class="close" data-dismiss="alert">X</button>
			<strong>El Producto "' . $_POST["codi_elimi"] . '" ha sido Eliminado con Exito</strong>
		</div>';
	}else{
		echo '<div class="alert alert-danger" align="center">
		<button type="button" class="close" data-dismiss="alert">X</button>
		<strong>El Producto "' . $_POST["codi_elimi"] . '" no puedo ser Eliminado</strong>
	</div>';
}
}else{
	if(isset($_POST["id_inv"])){

	$uploadedfileload="true";
	$msg = "";
	$uploadedfile_size=$_FILES['img_name']['size'];
	
	if ($_FILES['img_name']['size']>200000)
	{	
		$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<BR>";
		$uploadedfileload="false";
		$respuestaActualizar = "nok";
	}

	if (!($_FILES['img_name']['type'] =="image/jpeg" OR $_FILES['img_name']['type'] =="image/png"))
	{	
		$msg=$msg." Tu archivo tiene que ser JPG o PNG. Otros archivos no son permitidos<BR>";
		$uploadedfileload="false";
		$respuestaActualizar = "nok";
	}

	$file_name=$_FILES['img_name']['name'];
	$add="../views/images/articulos/$file_name";
	if($uploadedfileload=="true"){

	if(move_uploaded_file ($_FILES['img_name']['tmp_name'], $add)){
	
	}
	else{
		echo "Error al subir el archivo"; 
		$uploadedfileload="false";
		$respuestaActualizar = "nok";
		}

	}else
	{echo '<div class="alert alert-danger" align="center">
		<button type="button" class="close" data-dismiss="alert">X</button>
		<strong>'.$msg.'</strong>
		</div>';
	}
	if($uploadedfileload == "true"){
		
		$datosController = array("id_inv"=>$_POST["id_inv"], "vg_cod"=>$_POST["vg_cod"],"vg_tipo_prenda"=>$_POST["vg_tipo_prenda"],"vg_tipo_oro"=>$_POST["vg_tipo_oro"],"vg_descripcion"=>$_POST["vg_descripcion"],"vg_peso"=>$_POST["vg_peso"],"vg_brillante"=>$_POST["vg_brillante"],"vg_precio"=>$_POST["vg_precio"],"vg_fecha"=>$_POST["vg_fecha"],"img_name"=>$_FILES['img_name']['name'],"codTienda"=>"$cod_tienda");

		@$respuestaActualizar = TiendaModels::actualTiendaModel($datosController, "vg_inv");
	}
		if ($respuestaActualizar == "ok"){						
			echo '<div class="alert alert-success" align="center">
			<button type="button" class="close" data-dismiss="alert">X</button>
			<strong>El Producto "' . $_POST["vg_cod"] . '" ha sido Actualizado con Exito</strong>
		</div>';
	}else{
		echo '<div class="alert alert-danger" align="center">
		<button type="button" class="close" data-dismiss="alert">X</button>
		<strong>El Producto "' . $_POST["vg_cod"] . '" no puedo ser Actualizado</strong>
	</div>';
}

}
else{	if(isset($_POST["vg_cod"])){
	
	$uploadedfileload="true";
	$msg = "";
	$uploadedfile_size=$_FILES['img_name']['size'];
	
	if ($_FILES['img_name']['size']>200000)
	{
		$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<BR>";
		$uploadedfileload="false";
		$respuestaActualizar = "nok";
	}

	if (!($_FILES['img_name']['type'] =="image/jpeg" OR $_FILES['img_name']['type'] =="image/png"))
	{
		$msg=$msg." Tu archivo tiene que ser JPG o PNG. Otros archivos no son permitidos<BR>";
		$uploadedfileload="false";
		$respuestaActualizar = "nok";
	}

	$file_name=$_FILES['img_name']['name'];
	$add="../views/images/articulos/$file_name";
	if($uploadedfileload=="true"){

	if(move_uploaded_file ($_FILES['img_name']['tmp_name'], $add)){
	
	}
	else{
		echo "Error al subir el archivo"; 
		$uploadedfileload="false";
		$respuestaActualizar = "nok";
		}

	}else{
		echo '<div class="alert alert-danger" align="center">
		<button type="button" class="close" data-dismiss="alert">X</button>
		<strong>'.$msg.'</strong>
		</div>';
	}
	if($uploadedfileload == "true"){
	
	$datosController = array("vg_cod"=>$_POST["vg_cod"],"vg_tipo_prenda"=>$_POST["vg_tipo_prenda"],"vg_tipo_oro"=>$_POST["vg_tipo_oro"],"vg_descripcion"=>$_POST["vg_descripcion"],"vg_peso"=>$_POST["vg_peso"],"vg_brillante"=>$_POST["vg_brillante"],"vg_precio"=>$_POST["vg_precio"],"vg_fecha"=>$_POST["vg_fecha"],"img_name"=>$_FILES['img_name']['name'],"codTienda"=>"$cod_tienda");

	@$respuestaActualizar = TiendaModels::ingresarTiendaModel($datosController, "vg_inv");
	}
	if ($respuestaActualizar == "ok"){						
		echo '<div class="alert alert-success" align="center">
		<button type="button" class="close" data-dismiss="alert">X</button>
		<strong>El Producto "' . $_POST["vg_cod"] . '" ha sido Ingresado con Exito</strong>
	</div>';
}else{
	echo '<div class="alert alert-danger" align="center">
	<button type="button" class="close" data-dismiss="alert">X</button>
	<strong>El Producto "' . $_POST["vg_cod"] . '" no puedo ser Ingresado</strong>
</div>';
}
}


}
}


}

function limpiar($tags) {
	$tags = strip_tags($tags);
	return $tags;
}

}
?>