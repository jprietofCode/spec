
<?php

if($_SESSION["rol"] != "Administrador"){

    echo '<script>

	window.locations = "inicio";
	</script>';

    return;

}

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Vehículos
            <small>Panel de control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">vehículos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <?php
            // Obtener el valor del parámetro "tab" si está presente en la URL
            $tabActiva = isset($_GET['tab']) ? $_GET['tab'] : 'vehiculos';

            // Validar que el valor de "tab" sea uno de los permitidos
            $pestanasPermitidas = array('vehiculos', 'tipo-vehiculo', 'marcas', 'modelos');
            if (!in_array($tabActiva, $pestanasPermitidas)) {
                $tabActiva = 'vehiculos'; // Establecer "vehiculos" como valor por defecto si "tab" no es válido
            }
            //var_dump($tabActiva);
            // Función para aplicar la clase "active" a la pestaña actual
            function pestanaActiva($pestaña, $tabActiva)
            {
                $respuesta = "";
                if ($tabActiva === $pestaña) {
                    $respuesta = 'active';
                }
                return $respuesta;
            }
            ?>
            <div class="box-header with-border">
                <!-- Pestañas de navegación -->
                <ul class="nav nav-tabs">
                    <li class="<?php echo pestanaActiva('vehiculos', $tabActiva); ?>"><a href="#vehiculos" data-toggle="tab">Vehículos</a></li>
                    <li class="<?php echo pestanaActiva('tipo-vehiculo', $tabActiva); ?>"><a href="#tipo-vehiculo" data-toggle="tab">Tipo de vehículo</a></li>
                    <li class="<?php echo pestanaActiva('marcas', $tabActiva); ?>"><a href="#marcas" data-toggle="tab">Marcas</a></li>
                    <li class="<?php echo pestanaActiva('modelos', $tabActiva); ?>"><a href="#modelos" data-toggle="tab">Modelos</a></li>
                    <!-- Otras pestañas para las tablas relacionadas -->
                </ul>
                <br>
                <!-- Botón para agregar vehículo
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddVehiculo">Agregar vehículo</button>-->
            </div>

            <div class="box-body">
                <!-- Contenido de las pestañas -->
                <div class="tab-content">
                    <!-- Pestaña de vehículos -->
                    <div class="tab-pane <?php echo pestanaActiva('vehiculos', $tabActiva); ?>" id="vehiculos">
                        <!-- Botón para agregar vehículo -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddVehiculo">Agregar vehículo</button>
                        <br><br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaVehiculos">
                            <thead>
                                <tr>
                                    <th class="idSize">#</th>
                                    <th class="sizeV">placa</th>
                                    <th class="sizeV">Tipo Vehículo</th>
                                    <th class="sizeV">Marca</th>
                                    <th class="sizeV">Modelo</th>
                                    <th class="sizeV">Color</th>
                                    <th class="sizeV">Año</th>
                                    <th class="sizeV">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $item = null;
                                $valor = null;
                                $vehiculos = vehiculosC::ctrMostarVehiculos($item, $valor);
                                //var_dump($vehiculos);
                                foreach ($vehiculos as $key => $value){
                                    echo '<tr>
                                        <td>'.($key+1).'</td>
                                        <td>'.$value['placa'].'</td>';
                                    $item = "id_tipo_vehiculo";
                                    $valor = $value["tipo_vehiculo_id"];
                                    $tipoVehiculo = vehiculosC::ctrMostrarTipoVehiculo($item, $valor);
                                    //var_dump($tipoVehiculo);
                                    echo '<td>'.$tipoVehiculo["nombre_tipo_vehiculo"].'</td>';
                                    $item = "id_marca_vehiculo";
                                    $valor = $value["marca_vehiculo_id"];
                                    $marcaVehiculo = vehiculosC::ctrMostrarMarcaVehiculo($item, $valor);
                                    echo '<td>'.$marcaVehiculo["nombre_marca"].'</td>';
                                    $item = "id_modelo";
                                    $valor = $value["modelo_id"];
                                    $modeloVehiculo = vehiculosC::ctrMostrarModeloVehiculo($item, $valor);
                                    echo '<td>'.$modeloVehiculo["nombre_modelo"].'</td>';
                                    $item = "id_color";
                                    $valor = $value["color_id"];
                                    $colorVehiculo = colorC::ctrMostarColor($item, $valor);
                                    echo '<td>'.$colorVehiculo["nombre_color"].'</td>
                                    <td>'.$value['anio'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarVehiculo" idVehiculo="'.$value["id_vehiculo"].'" data-toggle="modal" data-target="#EditarVehiculo"><i class="fa fa-pencil"></i></button>
                                            
                                            <button class="btn btn-danger btnEliminarVehiculo" idVehiculo="'.$value["id_vehiculo"].'"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                    </tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- ============================================
                            Pestañas para las tablas relacionadas
                    ===============================================-->

                    <div class="tab-pane <?php echo pestanaActiva('tipo-vehiculo', $tabActiva); ?>" id="tipo-vehiculo">
                        <!-- Contenido de la tabla de Tipo Vehiculo-->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="tipoVehiculo" class="form-control" placeholder="Nuevo Tipo de vehículo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Tipo de vehículo</button>
                        </form>
                        <?php
                        $crearTipoVehiculo = new vehiculosC();
                        $crearTipoVehiculo -> ctrCrearTipoVehiculo();
                        ?>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaTipoVehicle">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $item = null;
                            $valor = null;
                            $tiposVehiculo = vehiculosC::ctrMostrarTipoVehiculo($item, $valor);
                            foreach ($tiposVehiculo as $key => $value){
                                echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value['nombre_tipo_vehiculo'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditTypeVehicle" idTypeVehicle="'.$value["id_tipo_vehiculo"].'" data-toggle="modal" data-target="#EditTVehicle"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnDeleteTypeVehicle" idTypeVehicle="'.$value["id_tipo_vehiculo"].'"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane <?php echo pestanaActiva('marcas', $tabActiva); ?>" id="marcas">
                        <!-- Contenido de la tabla de marcas -->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="marcaVehiculo" class="form-control" placeholder="Nueva Marca vehículo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Marca</button>
                        </form>
                        <?php
                        $crearMarcaVehiculo = new vehiculosC();
                        $crearMarcaVehiculo -> ctrCrearMarcaVehiculo();
                        ?>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaMarcaVehicle">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $item = null;
                            $valor = null;
                            $marcasVehiculo = vehiculosC::ctrMostrarMarcaVehiculo($item, $valor);
                            foreach ($marcasVehiculo as $key => $value){
                                echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value['nombre_marca'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditMarcaVehicle" idMarcaVehicle="'.$value["id_marca_vehiculo"].'" data-toggle="modal" data-target="#EditMarcaVehicle"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnDeleteMarcaVehicle" idMarcaVehicle="'.$value["id_marca_vehiculo"].'"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Modelo -->
                    <div class="tab-pane <?php echo pestanaActiva('modelos', $tabActiva); ?>" id="modelos">
                        <!-- Contenido de la tabla de modelos -->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="modeloVehiculo" class="form-control" placeholder="Nuevo modelo de vehículo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Modelo</button>
                        </form>
                        <?php
                        $crearModeloVehiculo = new vehiculosC();
                        $crearModeloVehiculo -> ctrCrearModeloVehiculo();
                        ?>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaModelVehicle">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $item = null;
                            $valor = null;
                            $modelosVehiculo = vehiculosC::ctrMostrarModeloVehiculo($item, $valor);
                            foreach ($modelosVehiculo as $key => $value){
                                echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value['nombre_modelo'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditModelVehicle" idModelVehicle="'.$value["id_modelo"].'" data-toggle="modal" data-target="#EditModelVehicle"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnDeleteModelVehicle" idModelVehicle="'.$value["id_modelo"].'"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Otros contenedores para las tablas relacionadas -->
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

<!--=====================================
MODAL WINDOWS - VEHICLE
======================================-->
<div id="modalAddVehiculo" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Agregar Vehículo</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- plaque -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                <input type="text" class="form-control input-lg" name="placa" placeholder="Ingrese placa" required>
                            </div>
                        </div>
                        <!-- vehicle type-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-truck"></i></span>
                                <select class="form-control input-lg" name="tipoVehiculo" id="" required>
                                    <option value="">Seleccionar tipo de vehículo</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $tipoVehiculo = vehiculosC::ctrMostrarTipoVehiculo($item, $valor);
                                    foreach ($tipoVehiculo as $key => $value) {
                                        echo '<option value="'.$value["id_tipo_vehiculo"].'">'.$value["nombre_tipo_vehiculo"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle brand-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                <select class="form-control input-lg" name="marcaVehiculo" id="">
                                    <option value="">Seleccione marca de vehículo</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $marcasVehiculo = vehiculosC::ctrMostrarMarcaVehiculo($item, $valor);
                                    foreach ($marcasVehiculo as $key => $value) {
                                        echo '<option value="'.$value["id_marca_vehiculo"].'">'.$value["nombre_marca"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle model-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                <select class="form-control input-lg" name="modeloVehiculo" id="">
                                    <option value="">Seleccionar modelo de vehículo</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $modelosVehiculo = vehiculosC::ctrMostrarModeloVehiculo($item, $valor);
                                    foreach ($modelosVehiculo as $key => $value) {
                                        echo '<option value="'.$value["id_modelo"].'">'.$value["nombre_modelo"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle color-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                <select class="form-control input-lg" name="colorVehiculo" id="">
                                    <option value="">Seleccionar color de vehículo</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $coloresVehiculo = colorC::ctrMostarColor($item, $valor);
                                    foreach ($coloresVehiculo as $key => $value) {
                                        echo '<option value="'.$value["id_color"].'">'.$value["nombre_color"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle year -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                <input type="text" class="form-control input-lg" name="yearVehiculo" placeholder="Año del vehículo" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                               MODAL FOOTER
                 ======================================-->
                <div class="modal-footer">
                    <button class="btn btn-default pull-left" type="button" data-dismiss="modal">Salir</button>
                    <button class="btn btn-primary" type="submit">Guardar Vehículo</button>
                </div>
            </form>
            <?php
            $crearVehiculo = new vehiculosC();
            $crearVehiculo -> ctrCrearVehiculo();
            ?>
        </div>
    </div>
</div>

<!--=====================================
 1 MODAL EDIT - VEHICLE
======================================-->
<div id="EditarVehiculo" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Vehículo</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="idVehiculo" id="idVehiculo">
                            </div>
                        </div>
                        <!-- plaque -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_plca">Placa de Vehículo</label>
                                <input type="text" class="form-control input-lg" name="edit_placa" id="edit_placa" required>
                            </div>
                        </div>
                        <!-- vehicle type-->
                        <div class="form-group-lg">
                            <div class="input-group-lg">
                                <label for="tipoV">Tipo de Vehículo</label>
                                <select class="form-control input-lg" name="edit_tipoVehiculo" id="tipoV" required>
                                    <option id="edit_tipoVehiculo" selected></option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $tipoVehiculo = vehiculosC::ctrMostrarTipoVehiculo($item, $valor);
                                    foreach ($tipoVehiculo as $key => $value) {
                                        echo '<option value="'.$value["id_tipo_vehiculo"].'">'.$value["nombre_tipo_vehiculo"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle brand-->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="marcaV">Marca de Vehículo</label>
                                <select class="form-control input-lg" name="edit_marcaVehiculo" id="marcaV">
                                    <option id="edit_marcaVehiculo"></option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $marcasVehiculo = vehiculosC::ctrMostrarMarcaVehiculo($item, $valor);
                                    foreach ($marcasVehiculo as $key => $value) {
                                        echo '<option value="'.$value["id_marca_vehiculo"].'">'.$value["nombre_marca"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle model-->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="modeloV">Modelo de Vehículo</label>
                                <select class="form-control input-lg" name="edit_modeloVehiculo" id="modeloV">
                                    <option id="edit_modeloVehiculo">Seleccionar modelo de vehículo</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $modelosVehiculo = vehiculosC::ctrMostrarModeloVehiculo($item, $valor);
                                    foreach ($modelosVehiculo as $key => $value) {
                                        echo '<option value="'.$value["id_modelo"].'">'.$value["nombre_modelo"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle color-->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="colorV">Color de Vehículo</label>
                                <select class="form-control input-lg" name="edit_colorVehiculo" id="colorV">
                                    <option id="edit_colorVehiculo">Seleccionar color de vehículo</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $coloresVehiculo = colorC::ctrMostarColor($item, $valor);
                                    foreach ($coloresVehiculo as $key => $value) {
                                        echo '<option value="'.$value["id_color"].'">'.$value["nombre_color"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle year -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_yearVehiculo">Año del vehículo</label>
                                <input type="text" class="form-control input-lg" id="edit_yearVehiculo" name="edit_yearVehiculo" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                               MODAL FOOTER
                 ======================================-->
                <div class="modal-footer">
                    <button class="btn btn-default pull-left" type="button" data-dismiss="modal">Salir</button>
                    <button class="btn btn-primary" type="submit">Actualizar Vehículo</button>
                </div>
            </form>
            <?php

            $editarVehiculo = new vehiculosC();
            $editarVehiculo -> ctrEditarVehiculo();
            ?>
        </div>
    </div>
</div>

<?php
    $eliminarVehiculo = new vehiculosC();
    $eliminarVehiculo -> ctrEliminarVehiculo();
?>
<!--============================================
               2  EDIT TYPE VEHICLE
===============================================-->
<div id="EditTVehicle" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Tipo Vehículo</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="id_TipoVehiculo" id="id_TipoVehiculo">
                            </div>
                        </div>
                        <!-- Type Vehicle -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="EditTipoVehicle">Tipo de Vehículo</label>
                                <input type="text" name="EditTipoVehicle" id="EditTipoVehicle" class="form-control" placeholder="Tipo de vehículo" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                               MODAL FOOTER
                 ======================================-->
                <div class="modal-footer">
                    <button class="btn btn-default pull-left" type="button" data-dismiss="modal">Salir</button>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>
            <?php

            $editarTipoVehiculo = new vehiculosC();
            $editarTipoVehiculo -> ctrEditarTipoVehiculo();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarTipoVehiculo = new vehiculosC();
$eliminarTipoVehiculo -> ctrEliminarTipoVehiculo();
?>
<!--============================================
          3  EDIT MARCA VEHICLE
===============================================-->
<div id="EditMarcaVehicle" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Marca Vehículo</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="id_MarcaVehiculo" id="id_MarcaVehiculo">
                            </div>
                        </div>
                        <!-- Brand Vehicle -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="EditMarcaVehiculo">Marca de Vehículo</label>
                                <input type="text" name="EditMarcaVehiculo" id="EditMarcaVehiculo" class="form-control" placeholder="Marca de vehículo" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                               MODAL FOOTER
                 ======================================-->
                <div class="modal-footer">
                    <button class="btn btn-default pull-left" type="button" data-dismiss="modal">Salir</button>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>
            <?php

            $editarMarcaVehiculo = new vehiculosC();
            $editarMarcaVehiculo -> ctrEditarMarcaVehiculo();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarMarcaVehiculo = new vehiculosC();
$eliminarMarcaVehiculo -> ctrEliminarMarcaVehiculo();
?>

<!--============================================
              4   EDIT MODEL VEHICLE
===============================================-->
<div id="EditModelVehicle" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Modelo Vehículo</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="id_ModeloVehiculo" id="id_ModeloVehiculo">
                            </div>
                        </div>
                        <!-- Type Vehicle -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="EditModeloVehicle">Modelo de Vehículo</label>
                                <input type="text" name="EditModeloVehicle" id="EditModeloVehicle" class="form-control" placeholder="Modelo de vehículo" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                               MODAL FOOTER
                 ======================================-->
                <div class="modal-footer">
                    <button class="btn btn-default pull-left" type="button" data-dismiss="modal">Salir</button>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>
            <?php

            $editarModeloVehiculo = new vehiculosC();
            $editarModeloVehiculo -> ctrEditarModeloVehiculo();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarModeloVehiculo = new vehiculosC();
$eliminarModeloVehiculo -> ctrEliminarModeloVehiculo();
?>