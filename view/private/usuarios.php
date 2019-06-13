<?php
include "../../core/helpers/header.php";
inicio:: header('Dashboard');
?>
<div class="row">

    <!-- Botón para abrir ventana de nuevo registro de usuarios -->
    <div class="input-field center-align col s12 m4">
        <a href="#modal-create" class="btn waves-effect indigo tooltipped modal-trigger" data-tooltip="Agregar"><i class="material-icons">add_circle</i></a>
    </div>
</div>
<!-- Tabla para mostrar los registros existentes -->
<table id="tabla_usuarios" class="highlight display">
    <thead>
        <tr>
            <th>Apellidos</th>
            <th>Nombres</th>
            <th>Correo</th>
            <th>Alias</th>
            <th>DUI</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody id="tbody-read">
    </tbody>
</table>
<!-- Ventana para crear un nuevo registro de Usuarios-->
<div id="modal-create" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Crear usuario</h4>
        <form method="post" id="form-create">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="create_nombres" type="text" name="create_nombres" class="validate" required/>
                    <label for="create_nombres">Nombres</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="create_apellidos" type="text" name="create_apellidos" class="validate" required/>
                    <label for="create_apellidos">Apellidos</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">email</i>
                    <input id="create_correo" type="email" name="create_correo" class="validate" required/>
                    <label for="create_correo">Correo</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person_pin</i>
                    <input id="create_alias" type="text" name="create_alias" class="validate" required/>
                    <label for="create_alias">Alias</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">security</i>
                    <input id="create_clave1" type="password" name="create_clave1" class="validate" minlenght="8" maxlength="8" required/>
                    <label for="create_clave1">Clave</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">security</i>
                    <input id="create_clave2" type="password" name="create_clave2" class="validate"  minlenght="8" maxlength="8" required/>
                    <label for="create_clave2">Confirmar clave</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">credit_card</i>
                    <input id="create_dui" type="text" name="create_dui" class="validate" minlenght="9" maxlength="9" required/>
                    <label for="create_dui">Dui</label>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>
<!-- Ventana para modificar un registro existente para la tabla de usuarios -->
<div id="modal-update" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Modificar usuario</h4>
        <form method="post" id="form-update">
            <input type="hidden" id="id_usuario" name="id_usuario"/>
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="update_nombres" type="text" name="update_nombres" class="validate" required/>
                    <label for="update_nombres">Nombres</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="update_apellidos" type="text" name="update_apellidos" class="validate" required/>
                    <label for="update_apellidos">Apellidos</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">email</i>
                    <input id="update_correo" type="email" name="update_correo" class="validate" required/>
                    <label for="update_correo">Correo</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person_pin</i>
                    <input id="update_alias" type="text" name="update_alias" class="validate" required/>
                    <label for="update_alias">Alias</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">credit_card</i>
                    <input id="update_dui" type="text" name="update_dui" class="validate" required/>
                    <label for="update_dui">Dui</label>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Modificar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>
<?php
include "../../core/helpers/footer.php";
pie:: pagina('usuarios.js');
?>
