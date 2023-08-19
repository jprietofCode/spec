<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Empresas
            <small>Panel de control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Empresas</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <?php
            // Obtener el valor del parámetro "tab" si está presente en la URL
            $tabActiva = isset($_GET['tab']) ? $_GET['tab'] : 'empresas';

            // Validar que el valor de "tab" sea uno de los permitidos
            $pestanasPermitidas = array('empresas', 'cargos');
            if (!in_array($tabActiva, $pestanasPermitidas)) {
                $tabActiva = 'empresas'; // Establecer "empresas" como valor por defecto si "tab" no es válido
            }

            // Función para aplicar la clase "active" a la pestaña actual
            function pestanaActivaEmpresa($pestana, $tabActiva)
            {
                $respuesta = "";
                if ($tabActiva === $pestana) {
                    $respuesta = 'active';
                }
                return $respuesta;
            }
            ?>
            <div class="box-header with-border">
                <!-- Pestañas de navegación -->
                <ul class="nav nav-tabs">
                    <li class="<?php echo pestanaActivaEmpresa('empresas', $tabActiva); ?>"><a href="#empresas" data-toggle="tab">Empresas</a></li>
                    <li class="<?php echo pestanaActivaEmpresa('cargos', $tabActiva); ?>"><a href="#cargos" data-toggle="tab">Cargos</a></li>
                </ul>
                <br>
            </div>
            <div class="box-body">
                <!-- TABS CONTENT EMPRESA -->
                <div class="tab-content">
                    <!-- Pestaña de Empresas -->
                    <div class="tab-pane <?php echo pestanaActivaEmpresa('empresas', $tabActiva); ?>" id="empresas">
                        <!-- Contenido de la tabla de empresas-->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="nombEmpresa" class="form-control" placeholder="Nueva Empresa" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Empresa</button>
                        </form>
                        <?php
                        $crearEmpresa = new EmpresasC();
                        $crearEmpresa -> ctrCrearEmpresa();
                        ?>
                        <br>
                        <div style="border-top: 1px solid #ccc; height: 1px; width: 100%;"></div>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaEmpresas">
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
                            $empresas = EmpresasC::ctrMostrarEmpresas($item, $valor);
                            foreach ($empresas as $key => $value){
                                echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value['nombre_empresa'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditEmpresa" idEmpresa="'.$value["id_empresas"].'" data-toggle="modal" data-target="#editEmpresa"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnDeleteEmpresa" idEmpresa="'.$value["id_empresas"].'"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane <?php echo pestanaActivaEmpresa('cargos', $tabActiva); ?>" id="cargos">
                        <!-- Contenido de la tabla de generos -->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="nombCargo" class="form-control" placeholder="Nuevo Cargo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Cargo</button>
                        </form>
                        <?php
                        $crearCargo = new EmpresasC();
                        $crearCargo -> ctrCrearCargo();
                        ?>
                        <br>
                        <div style="border-top: 1px solid #ccc; height: 1px; width: 100%;"></div>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaCargos">
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
                            $cargos = EmpresasC::ctrMostrarCargos($item, $valor);
                            foreach ($cargos as $key => $value){
                                echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value['nombre_cargo'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditCargo" idCargo="'.$value["id_cargos"].'" data-toggle="modal" data-target="#editCargos"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnDeleteCargo" idCargo="'.$value["id_cargos"].'"><i class="fa fa-trash"></i></button>
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
<!--============================================
               1  EDIT EMPRESA
===============================================-->
<div id="editEmpresa" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Empresa</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="id_Empresa" id="id_Empresa">
                            </div>
                        </div>
                        <!-- Type Vehicle -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_nombEmpresa">Nombre de Empresa</label>
                                <input type="text" name="edit_nombEmpresa" id="edit_nombEmpresa" class="form-control" placeholder="Nueva Empresa" required>
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
            $editarEmpresa = new EmpresasC();
            $editarEmpresa -> ctrEditarEmpresa();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarEmpresa = new EmpresasC();
$eliminarEmpresa -> ctrEliminarEmpresa();
?>
<!--============================================
               2  EDIT CARGO
===============================================-->
<div id="editCargos" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Cargo</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="id_Cargo" id="id_Cargo">
                            </div>
                        </div>
                        <!-- cargo -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_nombCargo">Nombre del Cargo</label>
                                <input type="text" name="edit_nombCargo" id="edit_nombCargo" class="form-control" placeholder="Nuevo Cargo" required>
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

            $editarCargo = new EmpresasC();
            $editarCargo -> ctrEditarCargo();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarCargo = new EmpresasC();
$eliminarCargo -> ctrEliminarCargo();
?>
