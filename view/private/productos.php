<?php
include "../../core/helpers/header.php";
inicio:: header('Dashboard');
?>
<div class="row">
  <!-- Botón para abrir ventana de nuevo registro -->
  <div class="input-field center-align col s12 m4">
      <a href="#modal-create" class="btn waves-effect indigo tooltipped modal-trigger" data-tooltip="Agregar"><i class="material-icons">add_circle</i></a>
  </div>
</div>
<!-- Tabla para mostrar los registros existentes -->
<table id="tabla_productos" class="highlight display">
<thead>
    <tr>
        <th>IMAGEN</th>
        <th>NOMBRE</th>
        <th>CATEGORIA</th>
        <th>TALLA</th>
        <th>GENERO</th>
        <th>MARCA</th>
    </tr>
</thead>
<tbody id="tbody-read">
</tbody>
</table>
<!-- Ventana para crear un nuevo registro -->
<div id="modal-create" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Agregar Productos</h4>
        <form method="post" id="form-create">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="create_producto" type="text" name="create_producto" class="validate" required/>
                    <label for="create_producto">Nombre producto</label>
                </div>
                <div class="input-field col s12 m6">
                <i class="material-icons prefix">grid_on</i>
                    <select id="create_categoria" name="create_categoria">
                    </select>
                    <label>Categoría</label>
                </div>
                <div class="input-field col s12 m6">
                <i class="material-icons prefix">format_size</i>
                    <select id="create_talla" name="create_talla">
                    </select>
                    <label>Talla</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">wc</i>
                    <select id="create_genero" name="create_genero">
                    </select>
                    <label>Genero</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">branding_watermark</i>
                    <select id="create_marca" name="create_marca">
                    </select>
                    <label>Marca</label>
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
<!-- Ventana para modificar un registro existente -->
<div id="modal-update" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Modificar Productos</h4>
        <form method="post" id="form-update">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="update_producto" type="text" name="update_producto" class="validate" required/>
                    <label for="update_producto">Nombre producto</label>
                </div>
                <div class="input-field col s12 m6">
                <i class="material-icons prefix">grid_on</i>
                    <select id="update_categoria" name="update_categoria">
                    </select>
                    <label>Categoría</label>
                </div>
                <div class="input-field col s12 m6">
                <i class="material-icons prefix">format_size</i>
                    <select id="update_talla" name="update_talla">
                    </select>
                    <label>Talla</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">wc</i>
                    <select id="update_genero" name="update_genero">
                    </select>
                    <label>Genero</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">branding_watermark</i>
                    <select id="update_marca" name="update_marca">
                    </select>
                    <label>Marca</label>
                </div>
                <div class="file-field input-field col s12 m6">
                    <div class="btn waves-effect">
                        <span><i class="material-icons">image</i></span>
                        <input id="update_archivo" type="file" name="update_archivo" required/>
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
</div><?php
include "../../core/helpers/footer.php";
pie:: pagina('productos.js');
?>
