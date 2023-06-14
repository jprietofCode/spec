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
            <div class="box-header with-border">
                <!-- Pestañas de navegación -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#vehiculos" data-toggle="tab">Vehículos</a></li>
                    <li><a href="#tipo-vehiculo" data-toggle="tab">Tipo de vehículo</a></li>
                    <li><a href="#marcas" data-toggle="tab">Marcas</a></li>
                    <li><a href="#colores" data-toggle="tab">Colores</a></li>
                    <li><a href="#modelos" data-toggle="tab">Modelos</a></li>
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
                    <div class="tab-pane active" id="vehiculos">
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
                                            <button class="btn btn-warning btn_editVehiculo" data-toggle="modal" data-target="#EditarVehiculo"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                    </tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pestañas para las tablas relacionadas -->
                    <div class="tab-pane" id="tipo-vehiculo">
                        <!-- Contenido de la tabla de marcas -->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="tipoVehiculo" class="form-control" placeholder="Nuevo Tipo de vehículo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Tipo de vehículo</button>
                        </form>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tablas">
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
                                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="marcas">
                        <!-- Contenido de la tabla de marcas -->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="marcaVehiculo" class="form-control" placeholder="Nueva Marca vehículo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Marca</button>
                        </form>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tablas">
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
                                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="colores">
                        <!-- Contenido de la tabla de colores -->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="colorVehiculo" class="form-control" placeholder="Nuevo color de vehículo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Color</button>
                        </form>
                        <br>
                        <table class="table table-bordered table-striped">
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
                            $coloresVehiculo = colorC::ctrMostarColor($item, $valor);
                            foreach ($coloresVehiculo as $key => $value){
                                echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value['nombre_color'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="modelos">
                        <!-- Contenido de la tabla de modelos -->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="modeloVehiculo" class="form-control" placeholder="Nuevo modelo de vehículo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Modelo</button>
                        </form>
                        <br>
                        <table class="table table-bordered table-striped">
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
                                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
MODAL EDIT - VEHICLE
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
                        <!-- plaque -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                <input type="text" class="form-control input-lg" name="edit_placa" required>
                            </div>
                        </div>
                        <!-- vehicle type-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-truck"></i></span>
                                <select class="form-control input-lg" name="edit_tipoVehiculo" id="" required>
                                    <option id="edit_tipoVehiculo"></option>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle brand-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                <select class="form-control input-lg" name="edit_marcaVehiculo" id="">
                                    <option id="edit_marcaVehiculo"></option>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle model-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                <select class="form-control input-lg" name="edit_modeloVehiculo" id="">
                                    <option id="edit_modeloVehiculo">Seleccionar modelo de vehículo</option>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle color-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                <select class="form-control input-lg" name="edit_colorVehiculo" id="">
                                    <option id="edit_colorVehiculo">Seleccionar color de vehículo</option>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle year -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
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
            /*
            $editarVehiculo = new vehiculosC();
            $editarVehiculo -> ctrEditarVehiculo();*/
            ?>
        </div>
    </div>
</div>