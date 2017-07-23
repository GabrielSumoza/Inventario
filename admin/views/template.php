<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Inicio</title>
	<meta name="viewport" content="width=device-width" initial-scale="1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- 	<meta http-equiv="Content-Type" content="text/html, charset=ISO-8859-1" /> -->
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>


	<!-- Le styles -->
	<link href="views/css/old/bootstrap.css" rel="stylesheet">
	<link href="views/css/old/bootstrap-responsive.css" rel="stylesheet">
	<link href="views/css/old/docs.css" rel="stylesheet">
	<link href="views/js/old/google-code-prettify/prettify.css" rel="stylesheet">
<!-- 	<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script> -->
	<script src="views/js/old/jquery.js"></script>
	<script src="views/js/old/bootstrap-transition.js"></script>
	<script src="views/js/old/bootstrap-alert.js"></script>
	<script src="views/js/old/bootstrap-modal.js"></script>
	<script src="views/js/old/bootstrap-dropdown.js"></script>
	<script src="views/js/old/bootstrap-scrollspy.js"></script>
	<script src="views/js/old/bootstrap-tab.js"></script>
	<script src="views/js/old/bootstrap-tooltip.js"></script>
	<script src="views/js/old/bootstrap-popover.js"></script>
	<script src="views/js/old/bootstrap-button.js"></script>
	<script src="views/js/old/bootstrap-collapse.js"></script>
	<script src="views/js/old/bootstrap-carousel.js"></script>
	<script src="views/js/old/bootstrap-typeahead.js"></script>
	<script src="views/js/old/bootstrap-affix.js"></script>
	<script src="views/js/old/holder/holder.js"></script>
	<script src="views/js/old/google-code-prettify/prettify.js"></script>
	<script src="views/js/old/application.js"></script>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="assets/js/html5shiv.js"></script>
          <![endif]-->

          <!-- Le fav and touch icons -->
          <link rel="apple-touch-icon-precomposed" sizes="144x144" href="views/images/ico/apple-touch-icon-144-precomposed.png">
          <link rel="apple-touch-icon-precomposed" sizes="114x114" href="views/images/ico/apple-touch-icon-114-precomposed.png">
          <link rel="apple-touch-icon-precomposed" sizes="72x72" href="views/images/ico/apple-touch-icon-72-precomposed.png">
          <link rel="apple-touch-icon-precomposed" href="views/images/ico/apple-touch-icon-57-precomposed.png">
          <link rel="icon" href="views/images/icono.jpg">


      </head>

      <body data-spy="scroll" data-target=".bs-docs-sidebar">
		<!--=====================================
		COLUMNA CONTENIDO        

		======================================-->	
		<?php

		$modulos = new Enlaces();
		$modulos -> enlacesController();
		
		?>
		<!--====  Fin de COLUMNA CONTENIDO  ====-->
		<footer>
			<div class="modal-footer">
				<div class="container">
					<div class="grid">
						<div class="inner-block">
							<p>@jdmorillol &copy; 2017 Todos los Derechos Reservados &nbsp;&nbsp;<span>|&nbsp;&nbsp;Vagu.com</span>&nbsp;&nbsp;<br><!--{%FOOTER_LINK} --></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>  
		</footer>
		<script src="views/js/script.js"></script>
		<script src="views/js/validarIngreso.js"></script>

	</body>

	</html>