<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:ingreso");

	exit();
}

include "views/modules/cabezote.php";
$bus = ''; #inicializar la variable
#paginar
$maximo = 30;
if (!empty($_POST['num'])) {
  $pag = $_POST['num'];
} else {
  $pag = 1;
}
date_default_timezone_set('Etc/GMT+4');	
$inicio = ($pag - 1) * $maximo;
$tienda = new tiendaControllers();
$total = $tienda -> tiendaController(2);
?>
<!--=====================================
MENSAJES        
======================================-->
<table class="table table-bordered">
	<tr class="vaguTable">
		<td>
			<div class="row-fluid">
				<div class="span6">
					<h3 class="text"><img src="views/images/carrera.png" class="img-circle" width="80" height="80"> 
						Boutique Aeropuerto</h3>        
					</div>
					<div class="span6" align="right">
						<form name="form1" method="post" action="" class="form-inline">
							<!-- INGRESAR NUEVA curso -->
							<a href="#nuevo" role="button" class="btn" data-toggle="modal">
								<i class="icon-book"></i> <strong>Ingresar Articulo</strong>
							</a> |
							<a href="#borrar" role="button" class ="btn" data-toggle="modal" title="Eliminar Articulo">
								<i class="icon-exclamation-sign"></i>
							</a> |
							<div class="input-prepend">
								<span class="add-on"><i class="icon-search"></i></span>
								<input name="bus" type="text" placeholder="Buscar Articulo" class="input-xlarge" autocomplete="off" autofocus>
							</div>
						</form>
					</div>
				</div>
			</td>
		</tr>
	</table>
	<?php
	$tienda -> crudTiendaController(2);
	?>
	<table class="table table-bordered table table-hover" style="table-layout:fixed">
		<tr class="vaguTable">
			<td width="50" height="20"><strong>CODIGO</strong></td>
			<td width="70" height="20"><strong>TIPO DE PRENDA</strong></td>
			<td width="70" height="20"><strong>TIPO DE ORO</strong></td>
			<td width="150" height="20"><strong>DESCRIPCI&#211;N</strong></td>
			<td width="50" height="20"><strong>PESO</strong></td>
			<td width="60" height="20"><strong>BRILLANTES</strong></td>
			<td width="40" height="20"><strong>PRECIO</strong></td>
			<td width="80" height="20"><strong>FECHA DE ENVIO</strong></td>
			<td width="35" height="20"><strong></strong></td>
		</tr>

		<?php
		$tienda -> datoTiendaController(2,$maximo,$inicio);
		?>
	</table>
  <div class="pagination" align="center">
    <ul>          
      <form name="form1" method="post">
        <?php
        if (empty($_POST['bus'])) {
            $tp = ceil($total / $maximo); #funcion que devuelve entero redondeado
            for ($n = 1; $n <= $tp; $n++) {
              if ($pag == $n) {
                echo '<button disabled type="text" name="num" value="'.$n.'" class="btn">'.$n.'</i>
              </button>';
            } else {
              echo '<button type="text" name="num" value="'.$n.'" class="btn">'.$n.'</i>
            </button>';
          }
        }
      }
      ?>
    </form>
  </ul>
</div>
<div id="nuevo" class="modal hide fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <form name="form1" method="post" action="" class="form-inline" enctype="multipart/form-data">
  <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
   <h3 id="myModalLabel">Agregar nuevo articulo</h3>
 </div>
 <div class="modal-body">
   <div class="row-fluid">
    <div class="span6">
     <br><strong>Codigo</strong><br>
     <input type="text" name="vg_cod" autocomplete="off"><br>
     <br><strong>Tipo de Oro</strong><br>
     <input type="text" name="vg_tipo_oro" autocomplete="off"><br>
     <br><strong>Peso</strong><br>
     <input type="text" name="vg_peso" autocomplete="off"><br>
     <br><strong>Precio</strong><br>
     <input type="text" name="vg_precio" autocomplete="off"><br>
   </div>
   <div class="span6">   
     <br><strong>Tipo de prenda</strong><br>
     <input type="text" name="vg_tipo_prenda" autocomplete="off"><br>
     <br><strong>Descripcion</strong><br>
     <input type="text" name="vg_descripcion" autocomplete="off"><br>
     <br><strong>Brillantes</strong><br>
     <input type="text" name="vg_brillante" autocomplete="off" ><br>
     <br><strong>Fecha de envio</strong><br>
     <input type="date" name="vg_fecha" autocomplete="off" " ><br>
   </div>
   <div class="span6">  
   <br><p class="help-block">Ingrese la imagen del articulo</p>
   <input name="img_name" type="file" /><br>
   <input type="hidden" name="MAX_FILE_SIZE" value="200000" />
   </div>
 </div>
</div>
<div class="modal-footer">
 <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> <strong>Cerrar</strong></button>
 <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> <strong>Guardar</strong></button>
</div>
</form>
</div>
<div id="borrar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <form name="form1" method="post" action="" class="form-inline">
  <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
   <h3 id="myModalLabel">Borrar Articulo</h3>
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

<!--====  Fin de MENSAJES  ====-->