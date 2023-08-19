<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Herramientas
            <small>Panel de control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Herramientas</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <?php
            // Obtener el valor del parámetro "tab" si está presente en la URL
            $tabActiva = isset($_GET['tab']) ? $_GET['tab'] : 'herramientas';

            // Validar que el valor de "tab" sea uno de los permitidos
            $pestanasPermitidas = array('herramientas', 'marca-tools', 'tipo-tools');
            if (!in_array($tabActiva, $pestanasPermitidas)) {
                $tabActiva = 'herramientas'; // Establecer "herramientas" como valor por defecto si "tab" no es válido
            }

            // Función para aplicar la clase "active" a la pestaña actual
            function pestanaActivaTools($pestana, $tabActiva)
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
                    <li class="<?php echo pestanaActivaTools('herramientas', $tabActiva); ?>"><a href="#herramientas" data-toggle="tab">Herramientas</a></li>
                    <li class="<?php echo pestanaActivaTools('tipo-tools', $tabActiva); ?>"><a href="#tipo-tools" data-toggle="tab">Tipo de Herramienta</a></li>
                    <li class="<?php echo pestanaActivaTools('marca-tools', $tabActiva); ?>"><a href="#marca-tools" data-toggle="tab">Marca de Herramienta</a></li>
                </ul>
                <br>

            </div>
            <div class="box-body">
                <div class="tab-content">
                    <!-- Pestaña de Herramientas-->
                    <div class="tab-pane <?php echo pestanaActivaTools('herramientas', $tabActiva); ?>" id="herramientas">
                        <!-- Botón para agregar herramienta -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddTools">Agregar Herramienta</button>
                        <br><br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaTools">
                            <thead>
                            <tr>
                                <th class="idSize">#</th>
                                <th class="sizeV">Nombre</th>
                                <th class="sizeV">Tipo Herramienta</th>
                                <th class="sizeV">Marca</th>
                                <th class="sizeV">Color</th>
                                <th class="sizeV">Función</th>
                                <th class="sizeV">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $item = null;
                            $valor = null;
                            $herramientas = ToolsC::ctrMostrarHerramientas($item, $valor);
                            //var_dump($vehiculos);
                            foreach ($herramientas as $key => $value){
                                echo '<tr>
                                        <td>'.($key+1).'</td>
                                        <td>'.$value['nombre_tools'].'</td>';
                                $item = "id_tipo_herramienta";
                                $valor = $value["tipo_herramienta_id"];
                                $tipoTools = ToolsC::ctrMostrarTipoHerramientas($item, $valor);

                                echo '<td>'.$tipoTools["nombre_tipo_herramienta"].'</td>';
                                $item = "id_marca_herramienta";
                                $valor = $value["marca_herramienta_id"];
                                $marcaTools = ToolsC::ctrMostrarMarcaHerramientas($item, $valor);
                                echo '<td>'.$marcaTools["nombre_herramienta"].'</td>';
                                $item = "id_color";
                                $valor = $value["color_id"];
                                $colorHerramienta = colorC::ctrMostarColor($item, $valor);
                                echo '<td>'.$colorHerramienta["nombre_color"].'</td>
                                    <td>'.$value['funcion'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarTools" idTools="'.$value["id_herramientas"].'" data-toggle="modal" data-target="#editarTools"><i class="fa fa-pencil"></i></button>
                                            
                                            <button class="btn btn-danger btnEliminarTools" idTools="'.$value["id_herramientas"].'"><i class="fa fa-trash"></i></button>
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

                    <div class="tab-pane <?php echo pestanaActivaTools('tipo-tools', $tabActiva); ?>" id="tipo-tools">
                        <!-- Contenido de la tabla de Tipo Vehiculo-->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="nombTipoTools" class="form-control" placeholder="Nuevo Tipo de Herramienta" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Tipo de Herramienta</button>
                        </form>
                        <?php
                        $crearTipoHerramienta = new ToolsC();
                        $crearTipoHerramienta -> ctrCrearTipoHerramienta();
                        ?>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaTipoTools">
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
                            $tiposTools = ToolsC::ctrMostrarTipoHerramientas($item, $valor);
                            foreach ($tiposTools as $key => $value){
                                echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value['nombre_tipo_herramienta'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditTypeTools" idTypeTools="'.$value["id_tipo_herramienta"].'" data-toggle="modal" data-target="#EditTTools"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnDeleteTypeTools" idTypeTools="'.$value["id_tipo_herramienta"].'"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane <?php echo pestanaActivaTools('marca-tools', $tabActiva); ?>" id="marca-tools">
                        <!-- Contenido de la tabla de marcas herrramietas -->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="marcaTools" class="form-control" placeholder="Nueva Marca Herramientas" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Marca</button>
                        </form>
                        <?php
                        $crearMarcaHerramienta = new ToolsC();
                        $crearMarcaHerramienta -> ctrCrearMarcaHerramienta();
                        ?>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaMarcaTools">
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
                            $marcasTools = ToolsC::ctrMostrarMarcaHerramientas($item, $valor);
                            foreach ($marcasTools as $key => $value){
                                echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value['nombre_herramienta'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditMarcaTools" idMarcaTools="'.$value["id_marca_herramienta"].'" data-toggle="modal" data-target="#EditMarcaTools"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnDeleteMarcaTools" idMarcaTools="'.$value["id_marca_herramienta"].'"><i class="fa fa-trash"></i></button>
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
        MODAL CREATE - TOOLS
======================================-->
<div id="modalAddTools" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Agregar Herramienta</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- name tools-->
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-gavel"></i></span>
                                <input type="text" class="form-control input-lg" name="nombTools" placeholder="Nombre de Herramienta" required>
                            </div>
                        </div>
                        <!-- tools type-->
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                <select class="form-control input-lg" name="tipoTools" id="" required>
                                    <option value="">Seleccionar tipo de Herramieta</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $tipoTools = ToolsC::ctrMostrarTipoHerramientas($item, $valor);
                                    foreach ($tipoTools as $key => $value) {
                                        echo '<option value="'.$value["id_tipo_herramienta"].'">'.$value["nombre_tipo_herramienta"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle brand-->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-puzzle-piece"></i></span>
                                <select class="form-control input-lg" name="marcaTools" id="">
                                    <option value="">Seleccione la Marca</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $marcaTopols = ToolsC::ctrMostrarMarcaHerramientas($item, $valor);
                                    foreach ($marcaTopols as $key => $value) {
                                        echo '<option value="'.$value["id_marca_herramienta"].'">'.$value["nombre_herramienta"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle model-->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>
                                <select class="form-control input-lg" name="colorTools" id="">
                                    <option value="">Seleccionar el color</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $colorTools = colorC::ctrMostarColor($item, $valor);
                                    foreach ($colorTools as $key => $value) {
                                        echo '<option value="'.$value["id_color"].'">'.$value["nombre_color"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- Descripcion de la funcionalidad-->
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                                <input type="text" class="form-control input-lg" name="funcionTools" placeholder="Descripción de su funcionalidad" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                               MODAL FOOTER
                 ======================================-->
                <div class="modal-footer">
                    <button class="btn btn-default pull-left" type="button" data-dismiss="modal">Salir</button>
                    <button class="btn btn-primary" type="submit">Crear Herramienta</button>
                </div>
            </form>
            <?php
            $crearTools = new ToolsC();
            $crearTools -> ctrCrearTools();
            ?>
        </div>
    </div>
</div>
<!--============================================
               1  EDIT TOOLS
===============================================-->
<div id="editarTools" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Herramienta</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="id_Herramienta" id="id_Herramienta">
                            </div>
                        </div>
                        <!-- Name Tools -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_nombTools">Nombre de Herramienta</label>
                                <input type="text" class="form-control input-lg" name="edit_nombTools" id="edit_nombTools" placeholder="Nombre de Herramienta" required>
                            </div>
                        </div>
                        <!-- tools type-->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="TipoToolsEdit">Tipo de Herramienta</label>
                                <select class="form-control input-lg" name="edit_tipoTools" id="TipoToolsEdit" required>
                                    <option id="edit_tipoTools" selected></option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $tipoTools = ToolsC::ctrMostrarTipoHerramientas($item, $valor);
                                    foreach ($tipoTools as $key => $value) {
                                        echo '<option value="'.$value["id_tipo_herramienta"].'">'.$value["nombre_tipo_herramienta"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- tools brand-->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="marcaToolsEdit">Marca de Herramienta</label>
                                <select class="form-control input-lg" name="edit_marcaTools" id="marcaToolsEdit">
                                    <option id="edit_marcaTools" selected></option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $marcaTopols = ToolsC::ctrMostrarMarcaHerramientas($item, $valor);
                                    foreach ($marcaTopols as $key => $value) {
                                        echo '<option value="'.$value["id_marca_herramienta"].'">'.$value["nombre_herramienta"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- color tools-->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="colorToolsEdit">Color de Herramienta</label>
                                <select class="form-control input-lg" name="edit_colorTools" id="colorToolsEdit">
                                    <option id="edit_colorTools" selected></option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $colorTools = colorC::ctrMostarColor($item, $valor);
                                    foreach ($colorTools as $key => $value) {
                                        echo '<option value="'.$value["id_color"].'">'.$value["nombre_color"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- Descripcion de la funcionalidad-->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_funcionTools">Funcionalidad</label>
                                <input type="text" class="form-control input-lg" name="edit_funcionTools" id="edit_funcionTools" placeholder="Descripción de su funcionalidad" required>
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
            $editarTools = new ToolsC();
            $editarTools -> ctrEditarTools();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarTools = new ToolsC();
$eliminarTools -> ctrEliminarTools();
?>
<!--=====================================
        2. MODAL EDIT TYPE TOOLS
======================================-->
<div id="EditTTools" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Tipo Herramienta</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="id_TipoHerramienta" id="id_TipoHerramienta">
                            </div>
                        </div>
                        <!-- type tools -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_nombTipoTools">Nombre de tipo herramienta</label>
                                <input type="text" name="edit_nombTipoTools" id="edit_nombTipoTools" class="form-control" placeholder="Nuevo tipo de herramienta" required>
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
            $editarTipoTools = new ToolsC();
            $editarTipoTools -> ctrEditarTipoHerramienta();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarTipoHeramienta = new ToolsC();
$eliminarTipoHeramienta -> ctrEliminarTipoHerramienta();
?>
<!--=====================================
        3. MODAL EDIT GENDER PERSON
======================================-->
<div id="EditMarcaTools" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Marca de Herramienta</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="id_MarcaTools" id="id_MarcaTools">
                            </div>
                        </div>
                        <!-- GENERO PERSONA -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="editMarcaTools">Nombre marca de herramienta</label>
                                <input type="text" name="editMarcaTools" id="editMarcaTools" class="form-control" placeholder="Nueva marca de herramienta" required>
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

            $editarMarcaTools = new ToolsC();
            $editarMarcaTools -> ctrEditarMarcaHerramienta();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarMarcaTools = new ToolsC();
$eliminarMarcaTools -> ctrEliminarMarcaHerramienta();
?>
