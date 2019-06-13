<?php
	//Esta es la pagina que se va a mostrar en las demas paginas
class inicio{
    public static function header($title){
        print('
        <!DOCTYPE html>
        <html lang="es">
        <head>
        	<meta charset="utf-8">
        	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        	<title>'.$title.'</title>

          <link rel="stylesheet" href="../../resources/css/materialize.min.css"/>
          <link rel="stylesheet" href="../../resources/css/iconos.css"/>
          <link rel="stylesheet" href="../../resources/css/pagina.css"/>
          <link rel="stylesheet" href="../../resources/css/jquery.dataTables.min.css"/>
          <link rel="stylesheet" href="../../resources/css/datatables.min.css"/>
        </head>
        <body>
            <header>
              <div class="navbar-fixed">
                <nav class="blue-grey darken-4">
                  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons icons">menu</i></a>
                  <div class="nav-wrapper">
                      <ul>
                          <li><a href="#" onclick="modalProfile()"><i class="material-icons icons">person</i></a></li>
                          <li><a href="#" onclick="signOff()"><i class="material-icons icons">power_settings_new</i></a></li>
                      </ul>
                      </div>
                  </div>
                </nav>
              </div>
              <ul id="slide-out" class="sidenav sidenav-fixed black">
                <li>
                  <div class="user-view">
                    <div class="background">
                      <img src="../../resources/img/pantalon.jpg">
                    </div>
                      <img class="circle" src="../../resources/img/menscloset.jpg">
                    <br>
                  </div>
                </li>
                <li><a class="white-text" href="inicio.php"> <i class="material-icons white-text">home</i> Inicio </a></li>
                <li><div class="divider black"></div></li>
                <li><a class="white-text" href="usuarios.php"><i class="material-icons white-text">account_circle</i>Usuarios</a></li>
                <li><div class="divider black"></div></li>
                <li><a class="white-text" href="categorias.php"><i class="material-icons white-text">format_list_numbered</i>Categorías</a></li>
                <li><div class="divider black"></div></li>
                <li><a class="white-text" href="lotes.php"><i class="material-icons white-text">archive</i>Lotes</a></li>
                <li><div class="divider black"></div></li>
                <li><a class="white-text" href="sucursales.php"><i class="material-icons white-text">store</i>Sucursales</a></li>
                <li><div class="divider black"></div></li>
                <li><a class="white-text" href="marcas.php"><i class="material-icons white-text">bookmark</i>Marcas</a></li>
                <li><div class="divider black"></div></li>
                <li><a class="white-text" href="tallas.php"><i class="material-icons white-text">more</i>Tallas</a></li>
                <li><div class="divider black"></div></li>
                <li><a class="white-text" href="planillas.php"><i class="material-icons white-text">attach_money</i>Planillas</a></li>
                <li><div class="divider black"></div></li>
                <li><a class="white-text" href="productos.php"><i class="material-icons white-text">grade</i>Productos</a></li>
              </ul>
            </header>
            <main>
        ');
      self::modals();
    }
    private function modals()
{
  print('
    <div id="modal-profile" class="modal">
      <div class="modal-content">
        <h4 class="center-align">Editar perfil</h4>
        <form method="post" id="form-profile">
          <div class="row">
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">person</i>
              <input id="profile_nombres" type="text" name="profile_nombres" class="validate" required/>
              <label for="profile_nombres">Nombres</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">person</i>
              <input id="profile_apellidos" type="text" name="profile_apellidos" class="validate" required/>
              <label for="profile_apellidos">Apellidos</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">email</i>
              <input id="profile_correo" type="email" name="profile_correo" class="validate" required/>
              <label for="profile_correo">Correo</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">person_pin</i>
              <input id="profile_alias" type="text" name="profile_alias" class="validate" required/>
              <label for="profile_alias">Alias</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">credit_card</i>
              <input id="profile_dui" type="text" name="profile_dui" class="validate" required/>
              <label for="profile_dui">Dui</label>
            </div>
          </div>
          <div class="row center-align">
            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
          </div>
        </form>
      </div>
    </div>
    <div id="modal-password" class="modal">
      <div class="modal-content">
        <h4 class="center-align">Cambiar contraseña</h4>
        <form method="post" id="form-password">
          <div class="row center-align">
            <label>CLAVE ACTUAL</label>
          </div>
          <div class="row">
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">security</i>
              <input id="clave_actual_1" type="password" name="clave_actual_1" class="validate" required/>
              <label for="clave_actual_1">Clave</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">security</i>
              <input id="clave_actual_2" type="password" name="clave_actual_2" class="validate" required/>
              <label for="clave_actual_2">Confirmar clave</label>
            </div>
          </div>
          <div class="row center-align">
            <label>CLAVE NUEVA</label>
          </div>
          <div class="row">
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">security</i>
              <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate" required/>
              <label for="clave_nueva_1">Clave</label>
            </div>
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">security</i>
              <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate" required/>
              <label for="clave_nueva_2">Confirmar clave</label>
            </div>
          </div>
          <div class="row center-align">
            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Cambiar"><i class="material-icons">save</i></button>
          </div>
        </form>
      </div>
    </div>
');
}}
?>
