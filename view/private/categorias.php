<?php
include "../../core/helpers/header.php";
inicio:: header('Dashboard');
?>
<div class="row">
  <!-- Formulario de búsqueda -->
  <!-- Botón para abrir ventana de una nueva categoria -->
  <div class="input-field center-align col s12 m4">
      <a href="#modal-create" class="btn waves-effect indigo tooltipped modal-trigger" data-tooltip="Agregar"><i class="material-icons">add_circle</i></a>
  </div>
</div>
<!-- Tabla para mostrar las categorias existentes -->
<table id="tabla_categorias" class="highlight display">
<thead>
    <tr>
        <th>IMAGEN</th>
        <th>NOMBRE</th>
        <th>ACCIÓN</th>
    </tr>
</thead>
<tbody id="tbody-read">
</tbody>
</table>
<!-- Ventana para crear un nueva categoria-->
<div id="modal-create" class="modal">
<div class="modal-content">
  <h4 class="center-align">Crear categoría</h4>
  <form method="post" id="form-create" enctype="multipart/form-data">
      <div class="row">
          <div class="input-field col s12 m6">
              <i class="material-icons prefix">note_add</i>
              <input id="create_nombre" type="text" name="create_nombre" class="validate" required/>
              <label for="create_nombre">Nombre</label>
          </div>
          <div class="file-field input-field col s12 m6">
              <div class="btn waves-effect">
                  <span><i class="material-icons">image</i></span>
                  <input id="create_archivo" type="file" name="create_archivo" required/>
              </div>
              <div class="file-path-wrapper">
                  <input type="text" class="file-path validate" placeholder="Seleccione una imagen de 500x500"/>
              </div>
          </div>
      </div>
      <div class="row center-align">
          <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
          <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"><i class="material-icons">save</i></button>
      </div>
  </form>
</div>
</div>
<!-- Ventana para modificar una categoria existente -->
<div id="modal-update" class="modal">
<div class="modal-content">
  <h4 class="center-align">Modificar categoría</h4>
  <form method="post" id="form-update" enctype="multipart/form-data">
      <input type="hidden" id="id_categoria" name="id_categoria"/>
      <input type="text" id="imagen_categoria" name="imagen_categoria"/>
      <div class="row">
          <div class="input-field col s12 m6">
              <i class="material-icons prefix">note_add</i>
              <input id="update_nombre" type="text" name="update_nombre" class="validate" required/>
              <label for="update_nombre">Nombre</label>
          </div>
          <div class="file-field input-field col s12 m6">
              <div class="btn waves-effect">
                  <span><i class="material-icons">image</i></span>
                  <input id="update_archivo" type="file" name="update_archivo" required/>
              </div>
              <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Seleccione una imagen de 500x500"/>
              </div>
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
pie:: pagina('categorias.js');
?>
