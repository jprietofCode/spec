<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Personas
            <small>Panel de control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Personas</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <?php
            // Obtener el valor del parámetro "tab" si está presente en la URL
            $tabActiva = isset($_GET['tab']) ? $_GET['tab'] : 'personas';

            // Validar que el valor de "tab" sea uno de los permitidos
            $pestanasPermitidas = array('personas', 'tipo-identidad', 'genero');
            if (!in_array($tabActiva, $pestanasPermitidas)) {
                $tabActiva = 'personas'; // Establecer "personas" como valor por defecto si "tab" no es válido
            }

            // Función para aplicar la clase "active" a la pestaña actual
            function pestanaActivaPersona($pestana, $tabActiva)
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
                    <li class="<?php echo pestanaActivaPersona('personas', $tabActiva); ?>"><a href="#personas" data-toggle="tab">Personas</a></li>
                    <li class="<?php echo pestanaActivaPersona('tipo-identidad', $tabActiva); ?>"><a href="#tipo-identidad" data-toggle="tab">Tipo de Identificación</a></li>
                    <li class="<?php echo pestanaActivaPersona('genero', $tabActiva); ?>"><a href="#genero" data-toggle="tab">Genero</a></li>
                </ul>
                <br>
            </div>
            <div class="box-body">
                <div class="tab-content">
                    <!-- TABS CONTENT PERSONS -->
                    <div class="tab-pane <?php echo pestanaActivaPersona('personas', $tabActiva);?>" id="personas">
                        <!-- Botón para agregar persona -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddPerson">Agregar Persona</button>
                        <br><br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaPersonas">
                            <thead>
                            <tr>
                                <th class="idSize">#</th>
                                <th class="sizeV">Tipo Identidad</th>
                                <th class="sizeV"># Identidad</th>
                                <th class="sizeV">Nombre</th>
                                <th class="sizeV">Apellidos</th>
                                <th class="sizeV">Tel. Celular</th>
                                <th class="sizeV">Tel. Fijo</th>
                                <th class="sizeV">Correo</th>
                                <th class="sizeV">Genero</th>
                                <th class="sizeV">Empresa</th>
                                <th class="sizeV">Cargo</th>
                                <th class="sizeV">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $item = null;
                            $valor = null;
                            $personas = PersonasC::ctrMostrarPersonas($item, $valor);

                            foreach ($personas as $key => $value){
                                echo '<tr>
                                        <td>'.($key+1).'</td>';
                                $item = "id_tipo_identificacion";
                                $valor = $value["tipo_identificacion_id"];
                                $tipoPersona = PersonasC::ctrMostrarIdPersona($item, $valor);
                                echo '<td>'.$tipoPersona["nombre_tipo"].'</td>
                                <td>'.$value['numero_id'].'</td>
                                <td>'.$value['nombres'].'</td>
                                <td>'.$value['apellidos'].'</td>
                                <td>'.$value['tel_celular'].'</td>
                                <td>'.$value['telefono_fijo'].'</td>
                                <td>'.$value['email'].'</td>';
                                $item = "id_genero";
                                $valor = $value["genero_id"];
                                $generoPersona = PersonasC::ctrMostrarGenero($item, $valor);
                                echo '<td>'.$generoPersona["nombre_genero"].'</td>';
                                $item = "id_empresas";
                                $valor = $value["empresa_id"];
                                $empresaPersona = EmpresasC::ctrMostrarEmpresas($item, $valor);
                                echo '<td>'.$empresaPersona["nombre_empresa"].'</td>';
                                $item = "id_cargos";
                                $valor = $value["cargo_id"];
                                $cargoPersona = EmpresasC::ctrMostrarCargos($item, $valor);
                                echo '<td>'.$cargoPersona["nombre_cargo"].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarPersona" idPersona="'.$value["id_personas"].'" data-toggle="modal" data-target="#EditarPersona"><i class="fa fa-pencil"></i></button>
                                            
                                            <button class="btn btn-danger btnEliminarPersona" idPersona="'.$value["id_personas"].'"><i class="fa fa-trash"></i></button>
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

                    <div class="tab-pane <?php echo pestanaActivaPersona('tipo-identidad', $tabActiva); ?>" id="tipo-identidad">
                        <!-- Contenido de la tabla de Tipo Identidad-->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="tipoIdentidad" class="form-control" placeholder="Nuevo Tipo de Identidad" required>
                                <input type="text" name="defIdentidad" class="form-control" placeholder="Descripción" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Tipo de Identidad</button>
                        </form>
                        <?php
                        $crearTipoIdPersona = new PersonasC();
                        $crearTipoIdPersona -> ctrCrearIdPersona();
                        ?>
                        <br>
                        <div style="border-top: 1px solid #ccc; height: 1px; width: 100%;"></div>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaTipoIdentidad">
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
                            $tiposIdentidad = PersonasC::ctrMostrarIdPersona($item, $valor);
                            foreach ($tiposIdentidad as $key => $value){
                                echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value['nombre_tipo'].'</td>
                                    <td>'.$value['definicion'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditTypeIdP" idTypePerson="'.$value["id_tipo_identificacion"].'" data-toggle="modal" data-target="#EditTPersona"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnDeleteTypeIdP" idTypePerson="'.$value["id_tipo_identificacion"].'"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane <?php echo pestanaActivaPersona('genero', $tabActiva); ?>" id="genero">
                        <!-- Contenido de la tabla de genero -->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="generoPersona" class="form-control" placeholder="Nuevo Genero de Persona" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Genero</button>
                        </form>
                        <?php
                        $crearGeneroPersona = new PersonasC();
                        $crearGeneroPersona -> ctrCrearGeneroPersona();
                        ?>
                        <br>
                        <div style="border-top: 1px solid #ccc; height: 1px; width: 100%;"></div>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaGeneroPersona">
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
                            $generoPerson = PersonasC::ctrMostrarGenero($item, $valor);
                            foreach ($generoPerson as $key => $value){
                                echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value['nombre_genero'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditGeneroP" idGeneroPersona="'.$value["id_genero"].'" data-toggle="modal" data-target="#EditGeneroP"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnDeleteGeneroP" idGeneroPersona="'.$value["id_genero"].'"><i class="fa fa-trash"></i></button>
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
CREATE PERSON  - MODAL WINDOWS
======================================-->
<div id="modalAddPerson" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Agregar Persona</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- Tipo id persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                                <select class="form-control input-lg" name="tipoIdPersona" id="tipoIdPersona" required>
                                    <option value="">Tipo de Identificación</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $tipoIdPersona = PersonasC::ctrMostrarIdPersona($item, $valor);
                                    foreach ($tipoIdPersona as $key => $value) {
                                        echo '<option value="'.$value["id_tipo_identificacion"].'">'.$value["nombre_tipo"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- Numero id persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                                <input type="text" class="form-control input-lg" name="numIdPersona" placeholder="Número de Identificación" required>
                            </div>
                        </div>
                        <!-- Nombre persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                <input type="text" class="form-control input-lg" name="nombPersona" placeholder="Ingrese el Nombre" required>
                            </div>
                        </div>
                        <!-- Apellido persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                <input type="text" class="form-control input-lg" name="apellPersona" placeholder="Ingrese el Apellido" required>
                            </div>
                        </div>
                        <!-- Tel Celular persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                <input type="text" class="form-control input-lg" name="celPersona" placeholder="Telefono Celular">
                            </div>
                        </div>
                        <!-- Tel fijo persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control input-lg" name="telPersona" placeholder="Telefono Fijo">
                            </div>
                        </div>
                        <!-- email persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                <input type="text" class="form-control input-lg" name="emailPersona" placeholder="Correo Electronico" required>
                            </div>
                        </div>
                        <!-- Genero de la persona-->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-transgender"></i></span>
                                <select class="form-control input-lg" name="generoPersona" id="generoPersona">
                                    <option value="">Seleccione Genero</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $generoPersona = PersonasC::ctrMostrarGenero($item, $valor);
                                    foreach ($generoPersona as $key => $value) {
                                        echo '<option value="'.$value["id_genero"].'">'.$value["nombre_genero"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- empresa persona-->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                                <select class="form-control input-lg" name="empresaPersona" id="">
                                    <option value="">Seleccionar Empresa</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $personaEmpresa = EmpresasC::ctrMostrarEmpresas($item, $valor);
                                    foreach ($personaEmpresa as $key => $value) {
                                        echo '<option value="'.$value["id_empresas"].'">'.$value["nombre_empresa"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- cargo persona-->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                <select class="form-control input-lg" name="cargoPersona" id="">
                                    <option value="">Seleccionar Cargo</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $personaCargo = EmpresasC::ctrMostrarCargos($item, $valor);
                                    foreach ($personaCargo as $key => $value) {
                                        echo '<option value="'.$value["id_cargos"].'">'.$value["nombre_cargo"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                               MODAL FOOTER
                 ======================================-->
                <div class="modal-footer">
                    <button class="btn btn-default pull-left" type="button" data-dismiss="modal">Salir</button>
                    <button class="btn btn-primary" type="submit">Crear Persona</button>
                </div>
            </form>
            <?php
            $crearPersona = new PersonasC();
            $crearPersona -> ctrCrearPersona();
            ?>
        </div>
    </div>
</div>
<!--=====================================
           1 MODAL EDIT - PERSONA
======================================-->
<div id="EditarPersona" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Persona</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="idPersona" id="idPersona">
                            </div>
                        </div>
                        <!-- Tipo id persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                                <select class="form-control input-lg" name="edit_tipoIdPersona" required>
                                    <option id="edit_tipoIdPersona" selected></option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $tipoIdPersona = PersonasC::ctrMostrarIdPersona($item, $valor);
                                    foreach ($tipoIdPersona as $key => $value) {
                                        echo '<option value="'.$value["id_tipo_identificacion"].'">'.$value["nombre_tipo"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- Numero id persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                                <input type="text" class="form-control input-lg" name="edit_numIdPersona" id="edit_numIdPersona" placeholder="Número de Identificación" required>
                            </div>
                        </div>
                        <!-- Nombre persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                <input type="text" class="form-control input-lg" name="edit_nombPersona" id="edit_nombPersona" placeholder="Ingrese el Nombre" required>
                            </div>
                        </div>
                        <!-- Apellido persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                <input type="text" class="form-control input-lg" name="edit_apellPersona" id="edit_apellPersona" placeholder="Ingrese el Apellido" required>
                            </div>
                        </div>
                        <!-- Tel Celular persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                <input type="text" class="form-control input-lg" name="edit_celPersona" id="edit_celPersona" placeholder="Telefono Celular">
                            </div>
                        </div>
                        <!-- Tel fijo persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control input-lg" name="edit_telPersona" id="edit_telPersona" placeholder="Telefono Fijo">
                            </div>
                        </div>
                        <!-- email persona -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                <input type="text" class="form-control input-lg" name="edit_emailPersona" id="edit_emailPersona" placeholder="Correo Electronico" required>
                            </div>
                        </div>
                        <!-- Genero de la persona-->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-transgender"></i></span>
                                <select class="form-control input-lg" name="edit_generoPersona">
                                    <option id="edit_generoPersona" selected></option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $generoPersona = PersonasC::ctrMostrarGenero($item, $valor);
                                    foreach ($generoPersona as $key => $value) {
                                        echo '<option value="'.$value["id_genero"].'">'.$value["nombre_genero"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- empresa persona-->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                                <select class="form-control input-lg" name="edit_empresaPersona">
                                    <option id="edit_empresaPersona" selected></option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $personaEmpresa = EmpresasC::ctrMostrarEmpresas($item, $valor);
                                    foreach ($personaEmpresa as $key => $value) {
                                        echo '<option value="'.$value["id_empresas"].'">'.$value["nombre_empresa"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- cargo persona-->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                <select class="form-control input-lg" name="edit_cargoPersona" >
                                    <option id="edit_cargoPersona" selected></option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $personaCargo = EmpresasC::ctrMostrarCargos($item, $valor);
                                    foreach ($personaCargo as $key => $value) {
                                        echo '<option value="'.$value["id_cargos"].'">'.$value["nombre_cargo"].'</option>';
                                    }
                                    ?>
                                </select>
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

            $editarPersona = new PersonasC();
            $editarPersona -> ctrEditarPersona();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarPersona = new PersonasC();
$eliminarPersona -> ctrEliminarPersona();
?>
<!--=====================================
        2. MODAL EDIT TYPE ID PERSON
======================================-->
<div id="EditTPersona" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Identificación</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="id_TipoPersona" id="id_TipoPersona">
                            </div>
                        </div>
                        <!-- Type Vehicle -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_tipoIdentidad">Tipo Identificación</label>
                                <input type="text" name="edit_tipoIdentidad" id="edit_tipoIdentidad" class="form-control" placeholder="Nuevo Tipo de Identidad" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_defIdentidad">Descripción</label>
                                <input type="text" name="edit_defIdentidad" id="edit_defIdentidad" class="form-control" placeholder="Descripción" required>
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

            $editarTipoIdPersona = new personasC();
            $editarTipoIdPersona -> ctrEditarIdPersona();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarTipoIdPersona = new PersonasC();
$eliminarTipoIdPersona -> ctrEliminarIdPersona();
?>
<!--=====================================
        3. MODAL EDIT GENDER PERSON
======================================-->
<div id="EditGeneroP" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Genero</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="idGenero" id="idGenero">
                            </div>
                        </div>
                        <!-- GENERO PERSONA -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_generoP">Nombre del Genero</label>
                                <input type="text" name="edit_generoPerson" id="edit_generoP" class="form-control" placeholder="Nuevo Genero de Persona" required>
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

            $editarGeneroPersona = new PersonasC();
            $editarGeneroPersona -> ctrEditarGenero();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarGeneroPersona = new PersonasC();
$eliminarGeneroPersona -> ctrEliminarGenero();
?>
