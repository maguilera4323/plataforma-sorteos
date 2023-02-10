<section class="navigation">
  <div class="nav-container">
    <div class="brand">
      <a href="#!">Logo</a>
    </div>
    <nav>
      <div class="nav-mobile"><a id="navbar-toggle" href="#!"><span></span></a></div>
      <ul class="nav-list">
        <li>
          <a href="<?php echo SERVERURL?>home/"><i class="fas fa-home"></i>&nbsp;Home</a>
        </li>
        <li>
          <a href="<?php echo SERVERURL?>empresas/"><i class="fas fa-industry"></i>&nbsp; Empresas</a>
        </li>
        <li>
          <a href="<?php echo SERVERURL?>sorteos/"><i class="fas fa-medal"></i>&nbsp; Sorteos</a>
        </li>
        <li>
          <a href="<?php echo SERVERURL?>premios/"><i class="fas fa-trophy"></i>&nbsp; Premios</a>
        </li>
        <li>
          <a href="#!"><i class="fas fa-tools"></i>&nbsp; Configuración</a>
          <ul class="navbar-dropdown">
            <li>
              <a href="<?php echo SERVERURL?>usuarios/"><i class="fas fa-users"></i></i>&nbsp; Usuarios</a>
            </li>
            <li>
              <a href="<?php echo SERVERURL?>roles/"><i class="fas fa-users-cog"></i>&nbsp; Roles</a>
            </li>
            <li>
              <a href="<?php echo SERVERURL?>permisos/"><i class="fas fa-tasks"></i>&nbsp; Permisos</a>
            </li>
            <li>
              <a href="<?php echo SERVERURL?>modulos/"><i class="fas fa-table"></i>&nbsp; Módulos</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#!">Contacto</a>
        </li>
        <li>
        <a href="#!"><i class="fas fa-user-circle"></i> &nbsp;<?php echo $_SESSION['usuario_login']?></a>
          <ul class="navbar-dropdown">
            <li>
              <a href="<?php echo SERVERURL?>perfil/<?php echo $_SESSION['id_login']?>"><i class="fas fa-user-edit"></i>&nbsp;Perfil</a>
            </li>
            <li>
              <a href="<?php echo SERVERURL?>salir/"><i class="fas fa-power-off"></i>&nbsp;Cerrar Sesión</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</section>