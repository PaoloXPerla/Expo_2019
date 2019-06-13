<?php
include "../../core/helpers/header.php";
inicio:: header('Dashboard');
?>
<div class="row">
    <!-- Botón para abrir ventana de nuevo registro de planillas -->
    <div class="input-field center-align col s12 m4">
        <a href="#modal-create" class="btn waves-effect indigo tooltipped modal-trigger" data-tooltip="Agregar"><i class="material-icons">add_circle</i></a>
    </div>
</div>
<!-- Tabla para mostrar las planillas existentes -->
<table id="tabla_planillas" class="highlight display">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Usuario</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody id="tbody-read">
    </tbody>
</table>
<!-- Ventana para crear una planilla -->
<div id="modal-create" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Crear lotes</h4>
        <form method="post" id="form-create">
            <div class="row">
                <div class="input-field col s12 m6">
                    <select id="create_usuario" name="create_usuario">
                    </select>
                </div>
                <div class="input-field col s12 m6">
                    <select id="create_estado" name="create_estado">
                    </select>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>
<?php
include "../../core/helpers/footer.php";
pie:: pagina('planillas.js');
?>
