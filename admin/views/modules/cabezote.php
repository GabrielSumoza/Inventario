<!--=====================================
 CABEZOTE             
 ======================================-->
 <div class="navbar navbar-inverse navbar-fixed-top">
 	<div class="navbar-inner">
 		<div class="container">
 			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
 				<span class="icon-bar"></span>
 				<span class="icon-bar"></span>
 				<span class="icon-bar"></span>
 			</button>
 			<div class="nav-collapse collapse">
 				<ul class="nav">
 					<li class="active">
 						<a href="inicio">Principal</a>
 					</li>
 					<li class="active">
 						<a href="caracas">Boutique Caracas</a>
 					</li>
 					<li class="active">
 						<a href="aeropuerto">Boutique Aeropuerto</a>
 					</li>
 					<li class="active">
 						<a href="miami">Boutique Miami</a>
 					</li>
 				</ul>
 				<!-- lado derecho 	-->
 				<ul class="nav pull-right">
 					<li id="fat-menu" class="dropdown active">
 						<a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">Hola! <?php echo $_SESSION["usuario"]; ?><b class="caret"></b></a>
 						<ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
 							<!--  							<li role="presentation"><a role="menuitem" tabindex="-1" href="cambiar_clave.php" target="admin">Cambiar Contraseña</a></li> -->
 							<!-- <li role="presentation" class="divider"></li>  -->
 							<li role="presentation"><a role="menuitem" tabindex="-1" href="../salir"><i class="icon-off"></i> Salir</a></li>
 						</ul>
 					</li>
 				</ul>
 				<!--========================================================-->
 			</div>
 		</div>
 	</div>
 </div>
<!--====  Fin de CABEZOTE  ====-->