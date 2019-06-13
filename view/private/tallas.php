<?php
include "../../core/helpers/header.php";
inicio:: header('Tallas');
?>
<div class="row">
  <!-- Botón para abrir ventana de nueva talla -->
  <div class="input-field center-align col s12 m4">
      <a href="#modal-create" class="btn waves-effect indigo tooltipped modal-trigger" data-tooltip="Agregar"><i class="material-icons">add_circle</i></a>
  </div>
</div>
<!-- Tabla para mostrar los registros talla -->
<table id="tabla_tallas" class="highlight display">
<thead>
    <tr>
        <th>Tallas</th>
        <th>Accion</th>
    </tr>
</thead>
<tbody id="tbody-read">
</tbody>
</table>
<!-- Ventana para crear un nueva talla -->
<div id="modal-create" class="modal">
<div class="modal-content">
  <h4 class="center-align">Crear talla</h4>
  <form method="post" id="form-create" enctype="multipart/form-data">
      <div class="row">
          <div class="input-field col s12 m6">
              <i class="material-icons prefix">assignment_late</i>
              <input id="create_talla" type="text" name="create_talla" class="validate" required/>
              <label for="create_talla">Talla</label>
          </div>
      </div>
      <div class="row center-align">
          <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
          <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"><i class="material-icons">save</i></button>
      </div>
  </form>
</div>
</div>
<!-- Ventana para modificar una talla existente -->
<div id="modal-update" class="modal">
<div class="modal-content">
  <h4 class="center-align">Modificar talla</h4>
  <form method="post" id="form-update" enctype="multipart/form-data">
      <input type="hidden" id="id_talla" name="id_talla"/>
      <div class="row">
          <div class="input-field col s12 m6">
              <i class="material-icons prefix">assignment_late</i>
              <input id="update_talla" type="text" name="update_talla" class="validate" required/>
              <label for="update_talla">Talla</label>
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
pie:: pagina('tallas.js');
?>
