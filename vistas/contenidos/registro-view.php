<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./DatosTablas/obtenerDatosUsuarios.php"); 

    $contar=new obtenerDatosUsuarios();
    $resultadoContar=$contar->contarUsuarios();
        foreach ($resultadoContar as $fila){
            $idPersonaActual=$fila['id_usuario']+1;
        }
    
    if (!isset($idPersonaActual)){
        $idPersonaActual=1;
    }

?>

<style>
    body{
  background: yellow;
  background: linear-gradient(to right, #ffa751,#ffe259 );

  }
</style>

<div class="registro-form">
    <form action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" method="POST" autocomplete="off">
        <section class="form-login">
          <h5>FORMULARIO DE REGISTRO</h5>
          <?php
			if(isset($_SESSION['respuesta'])){
				switch($_SESSION['respuesta']){
					case 'Usuario creado':
                        echo "<script>
                        setTimeout(function(){location.href='".SERVERURL."login/'} , 5000); </script>";
						echo '<style>
                        .registro-form .form-login{
                          width: 30rem;
                          height: 52rem;
                        }
                        </style>

                        <div class="alert alert-success text-center">Usuario creado exitosamente. Se le redirigirá al login...</div>';
					break;
					case 'Error al crear usuario':
						echo '<style>
                        .registro-form .form-login{
                          width: 30rem;
                          height: 52rem;
                        }
                        </style>

                        <div class="alert alert-danger text-center">El usuario no pudo ser creado por un error desconocido</div>';
					break;
                    case 'Usuario ya existe':
						echo '<style>
                        .registro-form .form-login{
                          width: 30rem;
                          height: 52rem;
                        }
                        </style>

                        <div class="alert alert-danger text-center">El usuario ingresado ya existe en el sistema</div>';
					break;
                    case '<style>
                    .registro-form .form-login{
                      width: 30rem;
                      height: 52rem;
                    }
                    </style>

                    Correo ya existe':
						echo '<div class="alert alert-danger text-center">El correo ingresado ya existe en el sistema</div>';
					break;
					}
				}
			?>
        <div class="row">
					<div class="col-10 col-md-6">
						<div class="form-group">
                            <label class="color-label">Nombres</label>
				            <input type="text" class="form-control" name="nombre_autoregistro" id="nom_usuario" 
				             placeholder="Ingrese sus nombres" required="" >
						</div>
					</div>
					<div class="col-10 col-md-6">
						<div class="form-group">
                            <label class="color-label">Apellidos</label>
					        <input type="text" class="form-control" name="apellido_autoregistro" id="nombre_usuario" 
					         placeholder="Ingrese sus apellidos" required="" >
						</div>
					</div>
                    <div class="col-10 col-md-6">
                    <br>
						<div class="form-group">
                            <label class="color-label">DNI (con guiones)</label>
				            <input type="text" class="form-control" name="dni_autoregistro" id="nom_usuario" 
                            placeholder="0000-0000-00000" required="" >
						</div>
					</div>
					<div class="col-10 col-md-6">
                    <br>
						<div class="form-group">
                            <label class="color-label">Teléfono</label>
					        <input type="text" class="form-control" name="tel_autoregistro" id="nombre_usuario" 
                            placeholder="0000-0000" required="" >
						</div>
					</div>
            </div>
            <br>
            <div class="form-group">
                <label class="color-label">Usuario</label>
				<input type="text" class="form-control" name="usuario_autoregistro" id="nombre_usuario"
                style="text-transform:lowercase;" placeholder="Ingrese su usuario" required="" >
			</div>
            <br>
            <div class="form-group">
            <label class="color-label">Sexo</label>
				<select class="form-control" name="sexo_autoregistro">
                    <option value="">Seleccione una opcion...</option>    
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                </select>
			</div>
            <br>
            <div class="form-group">
				<label class="color-label">Correo</label>
				<input type="email" class="form-control" name="correo_autoregistro" id="correo_electronico" 
                placeholder="ejemplo@correo.com" required="">
			</div>
            <br>
            <div class="form-group">
				<label class="color-label">Contraseña</label>
				<input type="password" class="form-control" name="contrasena_autoregistro" id="correo_electronico"
                placeholder="Ingrese su contraseña" required="">
			</div>
            <br>
            <div class="form-group">
				<label class="color-label">Dirección</label>
				<input type="text" class="form-control" name="dir_autoregistro" id="correo_electronico" 
                placeholder="Ingrese su dirección completa" required="">
			</div>
            <br>
          <input type="hidden" name="idPersona" class="form-control" value="<?php echo $idPersonaActual; ?>">
          <button class="buttons" type="submit" name="Registrar">REGISTRATE</button>
        </section>

    </form>
</div>