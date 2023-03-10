<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./DatosTablas/obtenerDatosUsuarios.php"); 
?>
<br>
<div class="container">
    <h2><i class="fas fa-user-edit"></i>&nbsp; Perfil</h2>
</div>
<hr/>

<!-- Menu de desplazamiento de vistas - forma descendente -->
<div class="container">
    <h5><i class="fas fa-home"></i>&nbsp; 
    <a href="<?php echo SERVERURL?>dashboard/"> Home </a>
    / 
    <a href="<?php echo SERVERURL?>empresas/"> Perfil </a></h5>
</div>
<br>

<div class="container perfil-contenedor">
    <h5 style="padding:0.6rem;"> <i class="fas fa-user"></i></i>&nbsp; Datos del usuario</h5>
    <hr/>
    <br>
    <?php
    //variables para generar la url completa del sitio y obtener el id del registro
      $host= $_SERVER["HTTP_HOST"];
      $url= $_SERVER["REQUEST_URI"];
      $url_completa="http://" . $host . $url; 
      //variable que contiene el id de la compra a editar
      $id = explode('/',$url_completa)[5];
        
        //se hace una instancia a la clase
        $datos=new obtenerDatosUsuarios();
        $resultado=$datos->datosPerfil($id);
        foreach ($resultado as $fila){
    ?>
        <div class="row">
                    <div class="col-10 col-md-4">
                        <div class="form-group">
                <label class="color-label">Nombre</label>
                        <input type="text" class="form-control" value="<?php echo $fila['nombres'] . ' ' .  $fila['apellidos']?>" readonly>
                            </div>
                        </div>
                    <div class="col-10 col-md-4">
                        <div class="form-group">
                <label class="color-label">Usuario</label>
                            <input type="text" class="form-control" value="<?php echo $fila['usuario'] ?>" readonly>
                        </div>
                    </div>
            <div class="col-10 col-md-4">
                        <div class="form-group">
                <label class="color-label">DNI</label>
                        <input type="text" class="form-control" value="<?php echo $fila['dni'] ?>" readonly>
                        </div>
                    </div>
        </div>
        <br>
        <div class="row">
                    <div class="col-10 col-md-4">
                        <div class="form-group">
                <label class="color-label">Correo Electr??nico</label>
                        <input type="text" class="form-control" value="<?php echo $fila['correo_electronico'] ?>" readonly>
                            </div>
                        </div>
                    <div class="col-10 col-md-4">
                        <div class="form-group">
                <label class="color-label">Tel??fono</label>
                            <input type="text" class="form-control" value="<?php echo $fila['telefono'] ?>" readonly>
                        </div>
                    </div>
            <div class="col-10 col-md-4">
                        <div class="form-group">
                <label class="color-label">Sexo</label>
                        <input type="text" class="form-control" value="<?php echo $fila['sexo'] ?>" readonly>
                        </div>
                    </div>
        </div>
        <br>
        <div class="row">
                    <div class="col-10 col-md-4">
                        <div class="form-group">
                <label class="color-label">Direcci??n</label>
                        <input type="text" class="form-control" value="<?php echo $fila['direccion'] ?>" readonly>
                            </div>
                        </div>
                    <div class="col-10 col-md-4">
                        <div class="form-group">
                <label class="color-label">Rol</label>
                            <input type="text" class="form-control" value="<?php echo $fila['rol'] ?>" readonly>
                        </div>
                    </div>
        </div>
        <br>
        <?php
                }
        ?>
        <div class="row row-cols-auto">
        <div class="col">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $id;?>">
            <i class="fas fa-user-edit"></i>&nbsp; Editar Datos</button>
            <!-- Modal actualizar-->
                <div class="modal fade" id="ModalAct<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar Informaci??n de Usuario</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-actualizar">
                        <form action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                            <div class="row">
                                <div class="col-10 col-md-6">
                                    <div class="form-group">
                                        <label class="label-actualizar">Nombres</label>
                                        <input type="text" class="form-control" name="nombre_perfil_act" 
                                        style="text-transform:uppercase;" value="<?php echo $fila['nombres']; ?>" required="" >
                                    </div>
                                </div>
                                <div class="col-10 col-md-6">
                                    <div class="form-group">
                                        <label class="label-actualizar">Apellidos</label>
                                        <input type="text" class="form-control" name="apellido_perfil_act" 
                                        style="text-transform:uppercase;" value="<?php echo $fila['apellidos']; ?>" required="" >
                                    </div>
                                </div>
                                <div class="col-10 col-md-6">
                                    <br>
                                        <div class="form-group">
                                            <label class="label-actualizar">Usuario</label>
                                            <input type="text" class="form-control" name="user_perfil_act" 
                                            style="text-transform:lowercase;" value="<?php echo $fila['usuario']; ?>" required="" >
                                        </div>
                                </div>
                                <div class="col-10 col-md-6">
                                    <br>
                                        <div class="form-group">
                                            <label class="label-actualizar">DNI</label>
                                            <input type="text" class="form-control" name="dni_perfil_act" value="<?php echo $fila['dni'] ?>" required="" >
                                        </div>
                                </div> 
                                <div class="col-10 col-md-6">
                                    <br>
                                        <div class="form-group">
                                            <label class="label-actualizar">Sexo</label>
                                            <select class="form-control" name="sexo_perfil_act" required>
                                                <option value="" selected>Seleccione una opci??n</option>
                                                <option value="1" <?php if ($fila['sexo'] == 'Masculino'): ?> selected<?php endif; ?>>Masculino</option>
                                                <option value="2" <?php if ($fila['sexo'] == 'Femenino'): ?> selected<?php endif; ?>>Femenino</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-10 col-md-6">
                                    <br>
                                        <div class="form-group">
                                            <label class="label-actualizar">Tel??fono</label>
                                            <input type="text" class="form-control" name="telefono_perfil_act" id="nombre_usuario" 
                                            value="<?php echo $fila['telefono']; ?>" required="" >
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="label-actualizar">Correo</label>
                                    <input type="email" class="form-control" name="correo_perfil_act" id="correo_electronico" 
                                    value="<?php echo $fila['correo_electronico']; ?>" required="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="label-actualizar">Direcci??n</label>
                                    <input type="text" class="form-control" name="direccion_perfil_act" id="correo_electronico" 
                                    value="<?php echo $fila['direccion']; ?>" required="">
                                </div>
                                <br>
                                <input type="hidden" value="<?php echo $fila['id_usuario']; ?>" class="form-control" name="user_perfil_id">
                                <button type="submit" class="btn btn-danger">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div class="col">
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalCambioClave<?php echo $id;?>">
        <i class="fas fa-unlock"></i> &nbsp; Cambiar Contrase??a</button>
            <!-- Modal actualizar-->
                <div class="modal fade" id="ModalCambioClave<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cambiar Contrase??a</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-actualizar">
                        <form action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                            <div class="form-group">
                                <label class="label-actualizar">Nueva Contrase??a</label>
                                <input type="password" class="form-control" name="contrasena_perfil_act" required="" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="label-actualizar">Confirmar Contrase??a</label>
                                <input type="password" class="form-control" name="confcontr_perfil_act" required="">
                            </div>
                            <br>
                            <input type="hidden" value="<?php echo $fila['id_usuario']; ?>" name="user_perfil_id">
                            <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" name="usuario_login">
                            <button type="submit" class="btn btn-danger">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div class="col">
            <form action="<?php echo SERVERURL; ?>modelos/respaldo.php">
                <button class="btn btn-danger">Respaldo</button>
            </form>
        </div>
        <div class="col"></div>
        <br>
        <br>
</div>