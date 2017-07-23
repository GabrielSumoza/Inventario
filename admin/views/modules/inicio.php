<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:ingreso");

	exit();

}

 $tienda = new tiendaControllers();
 $tiendaCaracas = $tienda -> tiendaController(1);
 $tiendaMiami = $tienda -> tiendaController(3);
 $tiendaAero = $tienda -> tiendaController(2);
 include "views/modules/cabezote.php";

?>

<!--=====================================
INICIO       
======================================-->
<table class="table table-bordered">
    <tr class="vaguTable">
        <td>
            <h3 class="text"><img src="views/images/admin.jpg" class="img-circle" width="80" height="80"> 
                Bienvenido/a  <?php echo $_SESSION["usuario"]; ?></h3>
            </td>
        </tr>
    </table>
    <div class="row-fluid" align="center">
        <div class="span4">
            <h3 align="center">Boutique Caracas</h3>
            <img src="views/images/inven.png" style="width: 200px; height: 200px;" title="Sector Alimentos"><br>
            <h3>Registrados: <?php echo $tiendaCaracas; ?></h3><br>
            <a href="caracas" class="btn btn-large btn-block btn-primary" type="button"><strong>Ver Mas Informaci&oacute;n</strong></a>
        </div>
        <div class="span4">
            <h3 align="center">Boutique Aeropuerto</h3>
            <img src="views/images/inven.png" style="width: 200px; height: 200px;" title="Sector Manufactura"><br>
            <h3>Registrados: <?php echo $tiendaAero; ?></h3><br>
            <a href="aeropuerto" class="btn btn-large btn-block btn-primary" type="button"><strong>Ver Mas Informaci&oacute;n</strong></a>
        </div>
        <div class="span4">
            <h3 align="center">Boutique Miami</h3>
            <img src="views/images/inven.png" style="width: 200px; height: 200px;" title="Sector Salud"><br>
            <h3>Registrados: <?php echo $tiendaMiami; ?></h3><br>
            <a href="miami" class="btn btn-large btn-block btn-primary" type="button"><strong>Ver Mas Informaci&oacute;n</strong></a>
        </div>
    </div>


<!--====  Fin de INICIO  ====-->