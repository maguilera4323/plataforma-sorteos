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
          <a href="#!">About</a>
        </li>
        <li>
          <a href="#!">Services</a>
          <ul class="navbar-dropdown">
            <li>
              <a href="#!">Sass</a>
            </li>
            <li>
              <a href="#!">Less</a>
            </li>
            <li>
              <a href="#!">Stylus</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#!">Portfolio</a>
        </li>
        <li>
          <a href="#!">Category</a>
          <ul class="navbar-dropdown">
            <li>
              <a href="#!">Sass</a>
            </li>
            <li>
              <a href="#!">Less</a>
            </li>
            <li>
              <a href="#!">Stylus</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#!">Contact</a>
        </li>
        <li>
        <a href="#!"><i class="fas fa-user-circle"></i> &nbsp;<?php echo $_SESSION['usuario_login']?></a>
          <ul class="navbar-dropdown">
            <li>
              <a href="<?php echo SERVERURL?>perfil/"><i class="fas fa-user-edit"></i>&nbsp;Perfil</a>
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

