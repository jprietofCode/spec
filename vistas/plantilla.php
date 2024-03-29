<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>spec</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="vistas/img/spec-mini-blue.png">
    <!--=====================================
     PLUGINS CSS
    ======================================-->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
    <!-- custom style  -->
    <link rel="stylesheet" href="vistas/dist/css/personalizado.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!--=====================================
     PLUGINS JAVASCRIPT
    ======================================-->
    <!-- jQuery 3 -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <!-- DataTables -->
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <!-- AdminLTE for demo purposes
   <script src="vistas/dist/js/demo.js"></script>-->
</head>
<!--=====================================
 CONTENT
======================================-->
<body class="hold-transition skin-blue sidebar-mini login-page">
<!-- Site wrapper -->
    <!-- header -->
    <?php
    if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
        echo '<div class="wrapper">';
        /*
         * Header
         * */
        include "modulos/cabezote.php";
        /*
         * menu Left side column.
         * */
        if($_SESSION['rol']=="Administrador"){
            include "modulos/menu.php";
        }
        if($_SESSION['rol']=="Guardia"){
            include "modulos/menuGuardia.php";
        }

        /*
         * Content
         * */
        if (isset($_GET["url"])) {
            if ($_GET["url"] == "inicio" ||
                $_GET["url"] == "usuarios" ||
                $_GET["url"] == "personas" ||
                $_GET["url"] == "empresas" ||
                $_GET["url"] == "vehiculos" ||
                $_GET["url"] == "herramientas" ||
                $_GET["url"] == "colores" ||
                $_GET["url"] == "destinos" ||
                $_GET["url"] == "acceso-persona" ||
                $_GET["url"] == "acceso-vehiculo" ||
                $_GET["url"] == "acceso-herramienta" ||
                $_GET["url"] == "salidas" ||
                $_GET["url"] == "reportes" ||
                $_GET["url"] == "salir") {
                include "modulos/" . $_GET["url"] . ".php";
            } else {
                include "modulos/404.php";
            }
        } else {
            include "modulos/inicio.php";
        }
        /*
         * Footer
         * */
        include "modulos/footer.php";
        echo '</div>';
    }else{
        include "modulos/login.php";
    }
    ?>


<!-- ./wrapper -->

<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/vehiculos.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/personas.js"></script>
<script src="vistas/js/empresas.js"></script>
<script src="vistas/js/colores.js"></script>
<script src="vistas/js/destinos.js"></script>
<script src="vistas/js/herramientas.js"></script>
</body>
</html>
