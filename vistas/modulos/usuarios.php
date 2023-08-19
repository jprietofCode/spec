<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Usuarios
            <small>Panel de control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Usuarios</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <?php
            // Obtener el valor del parámetro "tab" si está presente en la URL
            $tabActiva = isset($_GET['tab']) ? $_GET['tab'] : 'usuarios';

            // Validar que el valor de "tab" sea uno de los permitidos
            $pestanasPermitidas = array('usuarios', 'perfiles');
            if (!in_array($tabActiva, $pestanasPermitidas)) {
                $tabActiva = 'usuarios'; // Establecer "empresas" como valor por defecto si "tab" no es válido
            }

            // Función para aplicar la clase "active" a la pestaña actual
            function pestanaActivaUsuarios($pestana, $tabActiva)
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
                    <li class="<?php echo pestanaActivaUsuarios('usuarios', $tabActiva); ?>"><a href="#usuarios" data-toggle="tab">Usuarios</a></li>
                    <li class="<?php echo pestanaActivaUsuarios('perfiles', $tabActiva); ?>"><a href="#perfiles" data-toggle="tab">Perfiles</a></li>
                </ul>
                <br>
            </div>
            <div class="box-body">
                <!-- TABS CONTENT USERS -->
                <div class="tab-content">
                    <div class="tab-pane <?php echo pestanaActivaUsuarios('usuarios', $tabActiva); ?>" id="usuarios">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddUser">Agregar Persona</button>
                        <br><br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaUsuarios">
                            <thead>
                            <tr>
                                <th class="idSize">#</th>
                                <th class="sizeV">Usuario</th>
                                <th class="sizeV">Contraseña</th>
                                <th class="sizeV">Estado</th>
                                <th class="sizeV">Perfil</th>
                                <th class="sizeV">Persona</th>
                                <th class="sizeV">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $item = null;
                            $valor = null;
                            $usuarios = UsuariosC::ctrMostrarUsuarios($item, $valor);

                            foreach ($usuarios as $key => $value){
                                echo '<tr>
                                                <td>'.($key+1).'</td>
                                                <td>'.$value['nombre_usuario'].'</td>
                                                <td>'.$value['contrasena'].'</td>';
                                if($value["estado"] != 0){
                                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id_usuario"].'" estadoUsuario="0">Activo</button></td>';
                                }else{
                                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id_usuario"].'" estadoUsuario="1">Desactivado</button></td>';
                                }
                                $item = "id_perfil";
                                $valor = $value["perfil_id"];
                                $tipoPerfil = UsuariosC::ctrMostrarPerfiles($item, $valor);
                                echo '<td>'.$tipoPerfil["nombre_perfil"].'</td>';
                                $item = "id_personas";
                                $valor = $value["persona_id"];
                                $persona = PersonasC::ctrMostrarPersonas($item, $valor);
                                echo '<td>'.$persona["numero_id"].'</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-warning btnEditUsuario" idUsuario="'.$value["id_usuario"].'" data-toggle="modal" data-target="#EditarUsuario"><i class="fa fa-pencil"></i></button>
                                                    
                                                    <button class="btn btn-danger btnDeleteUsuario" idUsuario="'.$value["id_usuario"].'"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                            </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- PERFILES DE USUARIO-->
                    <div class="tab-pane <?php echo pestanaActivaUsuarios('perfiles', $tabActiva); ?>" id="perfiles">
                        <!-- Contenido de la tabla de perfiles -->
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="nombPerfil" class="form-control" placeholder="Nuevo Perfil" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Perfil</button>
                        </form>
                        <?php
                        $crearPerfilUsuario = new UsuariosC();
                        $crearPerfilUsuario -> ctrCrearPerfil();
                        ?>
                        <br>
                        <div style="border-top: 1px solid #ccc; height: 1px; width: 100%;"></div>
                        <br>
                        <table class="table table-bordered table-striped dt-responsive tablas tablaPerfiles">
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
                            $perfilesU = UsuariosC::ctrMostrarPerfiles($item, $valor);
                            foreach ($perfilesU as $key => $value){
                                echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value['nombre_perfil'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditPerfil" idPerfil="'.$value["id_perfil"].'" data-toggle="modal" data-target="#editPerfil"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnDeletePerfil" idPerfil="'.$value["id_perfil"].'"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!--=====================================
    1 MODAL CREATE - USER
======================================-->
<div id="modalAddUser" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Agregar Nuevo Usuario</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- Name User -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                <input type="text" class="form-control input-lg" name="nameUser" placeholder="Ingrese Nombre de Usuario" required>
                            </div>
                        </div>
                        <!-- Pass User-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control input-lg" name="passwordUser" placeholder="Ingrese Contraseña" required>
                            </div>
                        </div>
                        <!-- Perfil User-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="tipoPerfilUser" id="" required>
                                    <option value="">Seleccionar Perfil</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $perfilUser = UsuariosC::ctrMostrarPerfiles($item, $valor);
                                    foreach ($perfilUser as $key => $value) {
                                        echo '<option value="'.$value["id_perfil"].'">'.$value["nombre_perfil"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- vehicle brand-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>
                                <select class="form-control input-lg" name="personasID">
                                    <option value="">Seleccione Id Persona</option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $personas = PersonasC::ctrMostrarPersonas($item, $valor);
                                    foreach ($personas as $key => $value) {
                                        echo '<option value="'.$value["id_personas"].'">'.$value["numero_id"].'</option>';
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
                    <button class="btn btn-primary" type="submit">Crear Usuario</button>
                </div>
            </form>
            <?php
            $crearUsuario = new UsuariosC();
            $crearUsuario -> ctrCrearUsuario();
            ?>
        </div>
    </div>
</div>

<!--=====================================
    2 MODAL EDIT - USER
======================================-->
<div id="EditarUsuario" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Usuario</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="id_Usuario" id="id_Usuario">
                            </div>
                        </div>
                        <!-- name user -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_nameUser">Nombre de Usuario</label>
                                <input type="text" class="form-control input-lg" name="edit_nameUser" id="edit_nameUser" placeholder="Ingrese Nombre de Usuario" required>
                            </div>
                        </div>
                        <!-- Pass User-->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_passwordUser">Contraseña de Usuario</label>
                                <input type="password" class="form-control input-lg" name="edit_passwordUser" id="edit_passwordUser" placeholder="Ingrese Contraseña" required>
                            </div>
                        </div>
                        <!-- vehicle type-->
                        <div class="form-group-lg">
                            <div class="input-group-lg">
                                <label for="edit_PerfilUser">Perfil de Usuario</label>
                                <select class="form-control input-lg" name="edit_tipoPerfilUser" id="edit_PerfilUser" required>
                                    <option id="edit_tipoPerfilUser" selected></option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $perfilUser = UsuariosC::ctrMostrarPerfiles($item, $valor);
                                    foreach ($perfilUser as $key => $value) {
                                        echo '<option value="'.$value["id_perfil"].'">'.$value["nombre_perfil"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- Persona Usuario-->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="personaUser">Identificación de Persona</label>
                                <select class="form-control input-lg" name="edit_personasID" id="personaUser">
                                    <option id="edit_personasID" selected></option>
                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $personas = PersonasC::ctrMostrarPersonas($item, $valor);
                                    foreach ($personas as $key => $value) {
                                        echo '<option value="'.$value["id_personas"].'">'.$value["numero_id"].'</option>';
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
                    <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                </div>
            </form>
            <?php

            $editarUsuerio = new UsuariosC();
            $editarUsuerio -> ctrEditarUsuario();
            ?>
        </div>
    </div>
</div>

<?php
$eliminarUsuario = new UsuariosC();
$eliminarUsuario -> ctrEliminarUsuario();
?>
<!--=====================================
       3. MODAL EDIT - PERFIL
======================================-->
<div id="editPerfil" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                               MODAL HEADER
                 ======================================-->
                <div class="modal-header bg-head-modal">
                    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Editar Perfil de Usuario</h4>
                </div>
                <!--=====================================
                               MODAL BODY
                 ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-lg" name="id_Perfil" id="id_Perfil">
                            </div>
                        </div>
                        <!-- Type Vehicle -->
                        <div class="form-group">
                            <div class="input-group-lg">
                                <label for="edit_nombPerfil">Nombre de Perfil Usuario</label>
                                <input type="text" name="edit_nombPerfil" id="edit_nombPerfil" class="form-control" placeholder="Nuevo Perfil de Usuario" required>
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

            $editarPerfilUser = new UsuariosC();
            $editarPerfilUser -> ctrEditarPerfil();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarPerfilUser = new UsuariosC();
$eliminarPerfilUser -> ctrEliminarPerfil();
?>