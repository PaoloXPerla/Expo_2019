
<?php
include "../../core/helpers/banner.php";
banner::header('login');
?>
<!-- Formulario en donde se muestra los datos que se le piden al usuario para inciar sesion -->
<form id="form-sesion" method="post">
    <div class="container center-align">
      <div class="icono-cuenta">
        <div class="row">
            <i class=" large material-icons">account_circle</i>
        </div>
      </div>
            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <input id="usuario" name="usuario" type="text">
                    <label for="usuario"><i class="material-icons">person</i>Usuario</label>
                </div>
                <div class="input-field col s12 m6 offset-m3">
                    <input id="contra" name="contra" type="password">
                    <label for="contra"><i class="material-icons">lock</i>Contraseña</label>
                </div>
            </div>
            <div class="row">
                <input class="btn btn-primary" type="submit" value="Aceptar" style="color:black">
            </div>
            <div class="row">
                <a class="waves-effect waves-light btn yellow lighten-4"  style="color:black" href="registrar.php">Crear cuenta</a>
            </div>
        </form>

    </div>
    <?php
      include "../../core/helpers/footer_login.php";
      pie::login('login.js');
      ?>
