<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-admin" style="justify-content:right;">
  <div class="dropdown navbar-admin">
    <button class="boton-dropdown float-right navbar-admin"><i class="fas fa-user-circle"></i> &nbsp;<?php echo $_SESSION['usuario_login']?></button>
    <div class="dropdown-content navbar-admin">
      <a href="<?php echo SERVERURL?>perfil/<?php echo $_SESSION['id_login']?>"><i class="fas fa-user-edit"></i>&nbsp; Perfil</a>
      <a href="<?php echo SERVERURL?>salir/"><i class="fas fa-power-off"></i>&nbsp; Cerrar Sesión</a>
    </div>
  </div>
</nav>

