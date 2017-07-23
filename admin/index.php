<?php

require_once "models/enlaces.php";
require_once "models/tienda.php";


require_once "controllers/template.php";
require_once "controllers/enlaces.php";
require_once "controllers/tienda.php";

$template = new TemplateController();
$template -> template();