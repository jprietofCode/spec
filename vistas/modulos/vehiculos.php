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
                        <table class="table table-bordered table-striped dt-responsive tablas">
                            <thead>
                                <tr>
                                    <th class="idSize">#</th>
                                    <th>placa</th>
                                    <th>Tipo Vehículo</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Color</th>
                                    <th>Año</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <!-- Pestañas para las tablas relacionadas -->
                    <div class="tab-pane" id="marcas">
                        <!-- Contenido de la tabla de marcas -->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="marcaVehiculo" class="form-control" placeholder="Nueva Marca vehículo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Marca</button>
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
                            <tr>
                                <td></td>
                            </tr>
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
                            <tr>
                                <td></td>
                            </tr>
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
                            <tr>
                                <td></td>
                            </tr>
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
            <form role="form" action="post" >
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
                                <select class="form-control input-lg" name="tipoVehiculo" id="">
                                    <option value="">Seleccionar tipo de vehículo</option>
                                    <option value="motosicleta">Motosicleta</option>
                                    <option value="camin">Camion</option>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle brand-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                <select class="form-control input-lg" name="marcaVehiculo" id="">
                                    <option value="">Seleccione marca de vehículo</option>
                                    <option value="toyota">Toyata</option>
                                    <option value="mazda">Mazda</option>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle model-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                <select class="form-control input-lg" name="modeloVehiculo" id="">
                                    <option value="">Seleccionar modelo de vehículo</option>
                                    <option value="corollla">Corolla</option>
                                    <option value="m4">m4</option>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle color-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-car"></i></span>
                                <select class="form-control input-lg" name="colorVehiculo" id="">
                                    <option value="">Seleccionar color de vehículo</option>
                                    <option value="Rojo">Rojo</option>
                                    <option value="Negro">Negro</option>
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
                <?php
                    $crearVehiculo = new vehiculosC();
                    $crearVehiculo -> ctrCrearVehiculo();
                ?>
            </form>
        </div>
    </div>
</div>