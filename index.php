<?php
require_once "controladores/plantillaC.php";
require_once "controladores/vehiculosC.php";
require_once "controladores/colorC.php";
require_once "modelos/colorM.php";
require_once "modelos/vehiculosM.php";
$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();