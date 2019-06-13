<?php
include "../../core/helpers/banner.php";
banner:: header('registrar');
?>
<form method="post" id="form-registrar">
  <!-- Contenedor el cual guarda todo lo que se le pide a la persona para crear un nuevo usuario  -->
  <div class="container">
    <div class="row">
    <h1 align="center">Registrarse</h1>
        <div class="row">
          <div class="input-field col s6">
            <input id="nombres" name="nombres" type="text" class="form-control" required placeholder="Nombre"/>
            <label for="nombres" style="color:black"></label>
          </div>
          <div class="input-field col s6">
            <input id="apellidos" name="apellidos" type="text" class="form-control" required placeholder="Apellido"/>
            <label for="apellidos" style="color:black"></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input name="mail" type="text" class="form-control" required placeholder="Correo"/>
            <label for="mail" style="color:black"></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">account_box</i>
            <input name="usu" type="text" class="form-control" required placeholder="Usuario"/>
            <label for="usu" style="color:black"></label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">https</i>
            <input name="contra1" type="password" class="form-control" required placeholder="Contraseña"/>
            <label for="contra1" style="color:black"></label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">https</i>
            <input name="contra2" type="password" class="form-control" required placeholder="Confirmar contraseña"/>
            <label for="contra2" style="color:black"></label>
          </div>
          <div class="input-field col s6">
            <input name="dui" type="text" class="form-control" required placeholder="Dui"/>
            <label for="dui" style="color:black"></label>
          </div>
        </div>
      </div>
    </div>
        <div class="boton" align="center">
          <input class="btn btn-danger" type="submit" name="submit" value="Registrarse"/>
        </div>
        <div class="boton2" align="center">
          <div class="row">
            <a class="waves-effect waves-light btn yellow lighten-4"  style="color:black" href="index.php">Volver</a>
          </div>
        </div>
      </form>

<?php
include "../../core/helpers/footer_login.php";
pie::login('registrar.js');
?>
