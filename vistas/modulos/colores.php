
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Colores
            <small>Panel de control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">colores</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">


            <div class="box-body">
                <!-- Contenido de las pestañas -->
                <div class="tab-content">
                        <!-- Contenido de la tabla de colores -->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="newColor" class="form-control" placeholder="Nuevo color" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Color</button>
                        </form>
                        <?php
                        $crearColor = new colorC();
                        $crearColor -> ctrCrearColor();
                        ?>
                        <br>
                        <div style="border-top: 1px solid #ccc; height: 1px; width: 100%;"></div>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaColor">
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
                                            <button class="btn btn-warning btnEditColor" idColor="'.$value["id_color"].'" data-toggle="modal" data-target="#EditColor"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnDeleteColor" idColor="'.$value["id_color"].'"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    <!-- Otros contenedores para las tablas relacionadas -->
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

<!--============================================
                4 EDIT COLOR VEHICLE
===============================================-->
<div id="EditColor" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Color</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="id_Color" id="id_Color">
                            </div>
                        </div>
                        <!-- Color Vehicle -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="editColor">Color de Vehículo</label>
                                <input type="text" name="editColor" id="editColor" class="form-control" placeholder="Color de vehículo" required>
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
            $editarColor = new colorC();
            $editarColor -> ctrEditarColor();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarColor = new colorC();
$eliminarColor -> ctrEliminarColor();
?>
