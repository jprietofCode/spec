<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Destinos
            <small>Panel de control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">destinos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <!-- Contenido de las pestañas -->
                <div class="tab-content">
                    <!-- Destinos -->
                    <form method="post" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="nombDestino" class="form-control" placeholder="Nuevo Destino" required>
                            <input type="text" name="defDestino" class="form-control" placeholder="Descripción" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Destino</button>
                    </form>
                    <?php
                    $crearDestino = new DestinosC();
                    $crearDestino -> ctrCrearDestino();
                    ?>
                    <br>
                    <div style="border-top: 1px solid #ccc; height: 1px; width: 100%;"></div>
                    <br>
                    <table class="table table-bordered table-striped dt-responsive tablas tablaDestinos">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        $destinos = DestinosC::ctrMostrarDestino($item, $valor);
                        foreach ($destinos as $key => $value){
                            echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value['nombre_area'].'</td>
                                    <td>'.$value['funcion'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditDestino" idDestino="'.$value["id_destino"].'" data-toggle="modal" data-target="#editDestino"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnDeleteDestino" idDestino="'.$value["id_destino"].'"><i class="fa fa-trash"></i></button>
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

<!--=====================================
        MODAL EDIT - DESITNO
======================================-->
<div id="editDestino" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Destino</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="id_Destino" id="id_Destino">
                            </div>
                        </div>
                        <!-- Type Vehicle -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_nombDestino">nombre de Destino</label>
                                <input type="text" name="edit_nombDestino" id="edit_nombDestino" class="form-control" placeholder="Nuevo Destino" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_defDestino">Descripción</label>
                                <input type="text" name="edit_defDestino" id="edit_defDestino" class="form-control" placeholder="Descripción" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                               MODAL FOOTER
                 ======================================-->
                <div class="modal-footer">
                    <button class="btn btn-default pull-left" type="button" data-dismiss="modal">Salir</button>
                    <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                </div>
            </form>
            <?php

            $editarDestino = new DestinosC();
            $editarDestino -> ctrEditarDestino();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarDestino = new DestinosC();
$eliminarDestino -> ctrEliminarDestino();
?>