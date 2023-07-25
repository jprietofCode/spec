<header class="main-header">
    <!-- Logo -->
    <a href="inicio" class="logo">
        <!-- mini logo  -->
        <span class="logo-mini"><img src="vistas/img/spec-mini.svg" alt=""></span>
        <!-- logo regular -->
        <span class="logo-lg"><img src="vistas/img/spec_logo.png" class="img-responsive"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- perfil de usuario-->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <span class="hidden-xs">usuario</span>

                        <?php
                        /*
                        echo '<span class="hidden-xs">'.$_SESSION["apellido"]." ".$_SESSION["nombre"].'</span>';*/
                        ?>

                    </a>
                    <!-- Dropdown-toggle -->
                    <ul class="dropdown-menu" style="border: 1px solid black">
                        <!--<li class="user-body">
                            <div class="pull-right">
                                <a href="" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>-->

                        <!-- User image -->
                        <li class="user-header" style="height: 100px;">
                            <?php

                            /*if($_SESSION["rol"] == "Administrador"){

                                echo '<p>'.$_SESSION["apellido"]." ".$_SESSION["nombre"].' - Administrador</p>';

                            }else{
                                echo '<p>'.$_SESSION["apellido"]." ".$_SESSION["nombre"].'- Libreta: '.$_SESSION["libreta"].'</p>';
                                $columna = "id";
                                $valor = $_SESSION["id_carrera"];
                                $carrera = CarrerasC::VerCarreras2C($columna, $valor);
                                echo '<p>'.$carrera["nombre"].'</p>';
                            }*/

                            ?>

                        </li>
                        <!-- Menu Body -->

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="http://localhost/learnphp/gestionU/mis-datos" class="btn btn-primary btn-flat">Mis Datos</a>
                            </div>
                            <div class="pull-right">
                                <a href="salir" class="btn btn-danger btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>