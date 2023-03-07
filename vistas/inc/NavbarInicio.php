<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");



header a {
  text-decoration: none;
}

header {
  padding: 0 20px;
  background-color: #1d1f1d;
  height: 60px;
  display: flex;
  justify-content: space-between;
}

#brand {
  font-weight: bold;
  font-size: 18px;
  display: flex;
  align-items: center;
}

#brand a {
  color: #09c372;
}

header ul {
  list-style: none;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: space-around;
  font-family: "Poppins", sans-serif;
}

header ul a {
  color: white;
}

header ul li {
  padding: 5px;
  margin-left: 10px;
}

header ul li:hover {
  transform: scale(1.1);
  transition: 0.3s;
}

#login,
#signup {
  border-radius: 5px;
  padding: 5px 8px;
  color:white;
}
/* 
#login {
  border: 1px solid #498afb;
}

#signup {
  border: 1px solid #ff3860;
} */

#signup a {
  color: white;
}

#login a {
  color: white;
}

#hamburger-icon {
  margin: auto 0;
  display: none;
  cursor: pointer;
}

#hamburger-icon div {
  width: 35px;
  height: 3px;
  background-color: white;
  margin: 6px 0;
  transition: 0.4s;
}

.open .bar1 {
  -webkit-transform: rotate(-45deg) translate(-6px, 6px);
  transform: rotate(-45deg) translate(-6px, 6px);
}

.open .bar2 {
  opacity: 0;
}

.open .bar3 {
  -webkit-transform: rotate(45deg) translate(-6px, -8px);
  transform: rotate(45deg) translate(-6px, -8px);
}

.open .mobile-menu {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  background-color:#1d1f1d;
}

.mobile-menu {
  display: none;
  position: absolute;
  top: 50px;
  left: 0;
  height: calc(100vh - 50px);
  width: 100%;
}

.mobile-menu li {
  margin-bottom: 10px;
  font-family: "Poppins", sans-serif;
}

@media only screen and (max-width: 600px) {
  header nav {
    display: none;
  }

  #hamburger-icon {
    display: block;
  }
}
</style>

<header>
      <div id="brand"><img src="../vistas/assets/img/logo-compania.png" width="90" height="50" alt=""></div>
      <nav>
        <ul>
          <li><a href="<?php echo SERVERURL?>inicio/"><i class="fas fa-home"></i>&nbsp; Inicio</a></li>
          <li id="login"><a href="<?php echo SERVERURL?>login/" ><i class="fas fa-user-circle"></i>&nbsp; Iniciar Sesión</a></li>
          <li id="signup"><a href="<?php echo SERVERURL?>registro/"><i class="fas fa-user-plus"></i>&nbsp;Registrate</a></li>
        </ul>
      </nav>
      <div id="hamburger-icon" onclick="toggleMobileMenu()">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <ul class="mobile-menu">
          <li><a href="<?php echo SERVERURL?>inicio/"><i class="fas fa-home"></i>&nbsp; Inicio</a></li>
          <li id="login"><a href="<?php echo SERVERURL?>login/" ><i class="fas fa-user-circle"></i>&nbsp; Iniciar Sesión</a></li>
          <li id="signup"><a href="<?php echo SERVERURL?>registro/"><i class="fas fa-user-plus"></i>&nbsp;Registrate</a></li>
        </ul>
      </div>
    </header>
