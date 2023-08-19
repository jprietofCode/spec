<?php
require_once "controladores/plantillaC.php";
require_once "controladores/usuariosC.php";
require_once "modelos/usuariosM.php";
require_once "controladores/personasC.php";
require_once "modelos/personasM.php";
require_once "controladores/empresasC.php";
require_once "modelos/empresasM.php";
require_once "controladores/herramientasC.php";
require_once "modelos/herramientasM.php";
require_once "controladores/destinosC.php";
require_once "modelos/destinosM.php";
require_once "controladores/vehiculosC.php";
require_once "modelos/vehiculosM.php";
require_once "controladores/colorC.php";
require_once "modelos/colorM.php";
$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();