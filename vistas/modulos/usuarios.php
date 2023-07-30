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
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>
            </div>
            <div class="box-body">
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
                            echo '<td><button class="btn btn-success btn-xs">Activo</button></td>';
                        }else{
                            echo '<td><button class="btn btn-danger btn-xs">Desactivado</button></td>';
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
                                            <button class="btn btn-warning btnEditarVehiculo" idUsuario="'.$value["id_usuario"].'" data-toggle="modal" data-target="#EditarVehiculo"><i class="fa fa-pencil"></i></button>
                                            
                                            <button class="btn btn-danger btnEliminarVehiculo" idUsuario="'.$value["id_usuario"].'"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                    </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>