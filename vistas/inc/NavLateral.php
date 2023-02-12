<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

  <div id="sidemenu" class="menu-collapsed">
    <div id="header">
      <div id="menu-btn">
        <div class="btn-hamburger"></div>
        <div class="btn-hamburger"></div>
        <div class="btn-hamburger"></div>
      </div>
    </div>

    <div id="profile">
      <div id="photo"><img src="../vistas/assets/icons/Avatar.png" width="150" height="150" alt=""></div>
      <div id="name"><span><?php echo $_SESSION['usuario_login']?></span></div>
      <div id="user"><?php echo $_SESSION['usuario_login']?></div>
      <div id="user"><?php echo $_SESSION['rol']?></div>
    </div> 

    <div id="menu-items">
      <div class="item">
        <a href="<?php echo SERVERURL?>dashboard/">
          <div class="icon"><i class="fas fa-home"></i></div>
          <div class="title">Inicio</div>
        </a>

        <a href="<?php echo SERVERURL?>empresas/">
          <div class="icon"><i class="fas fa-industry"></i></div>
          <div class="title">Empresas</div>
        </a>

        <a href="<?php echo SERVERURL?>sorteos/">
          <div class="icon"><i class="fas fa-medal"></i></div>
          <div class="title">Sorteos</div>
        </a>

        <a href="<?php echo SERVERURL?>premios/">
          <div class="icon"><i class="fas fa-trophy"></i></div>
          <div class="title">Premios</div>
        </a>

        <a href="<?php echo SERVERURL?>configuracion/">
          <div class="icon"><i class="fas fa-tools"></i></div>
          <div class="title">Configuración</div>
        </a>

        <a href="<?php echo SERVERURL?>administracion/">
          <div class="icon"><i class="fas fa-archive"></i></div>
          <div class="title">Administracion</div>
        </a>

        <a href="<?php echo SERVERURL?>estadisticas/">
          <div class="icon"><i class="fas fa-chart-area"></i></div>
          <div class="title">Estadísticas</div>
        </a>
      </div>
    </div>

  </div>
