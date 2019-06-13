<?php
include "../../core/helpers/header.php";
inicio:: header('Dashboard');
?>
<div class="row">
  <!-- Botón para abrir ventana de nuevo lote -->
    <div class="input-field center-align col s12 m4">
        <a href="#modal-create" class="btn waves-effect indigo tooltipped modal-trigger" data-tooltip="Agregar"><i class="material-icons">add_circle</i></a>
    </div>
</div>
<!-- Tabla para mostrar los lotes existentes -->
<table id="tabla_lotes" class="highlight display">
    <thead>
        <tr>
            <th>Número</th>
            <th>Producto</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody id="tbody-read">
    </tbody>
</table>
<!-- Ventana para crear un lote nuevo -->
<div id="modal-create" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Crear lotes</h4>
        <form method="post" id="form-create">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">looks_one</i>
                    <input id="create_numero" type="text" name="create_numero" class="validate" required/>
                    <label for="create_numero">Número</label>
                </div>
                <!--  <div class="input-field col s12 m6">
                    <i class="material-icons prefix">date_range</i>
                    <input id="create_fecha" type="text" name="create_fecha" class="validate" required/>
                    <label for="create_fecha">Fecha</label>
                </div>-->
                <div class="input-field col s12 m6">
                    <select id="create_producto" name="create_producto">
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
pie:: pagina('lotes.js');
?>
