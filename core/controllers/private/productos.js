$(document).ready(function () {
    showTable();
    showSelectCategorias();
    showSelectTalla();
    showSelectMarcas();
    showSelectGenero();

})

// Constantes para establecer las rutas y parámetros de comunicación con la API
const api = '../../core/api/private/productos.php?action=';
const productos = '../../core/api/private/productos.php?action=read';

function showSelectCategorias() {
    $.ajax({
        url: api + 'cargarSelectCategoria',
        type: 'post',
        data: null,
        datatype: 'json'
    })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    let content = '';
                    result.dataset.forEach(function (row) {
                        content += `<option value="${row.Id_categoria}">${row.Categoria}</option>`;
                    });
                    $('#create_categoria').html(content);
                } else {
                    $('#create_categoria').html('<option value="">No hay opciones</option>');
                }
                $('select').formSelect();
            } else {
              sweetAlert(2, response, null);
              //console.log(response);
            }
        })
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}
function showSelectTalla() {
    $.ajax({
        url: api + 'cargarSelectTalla',
        type: 'post',
        data: null,
        datatype: 'json'
    })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    let content = '';
                    result.dataset.forEach(function (row) {
                        content += `<option value="${row.Id_talla}">${row.Talla}</option>`;
                    });
                    $('#create_talla').html(content);
                } else {
                    $('#create_talla').html('<option value="">No hay opciones</option>');
                }
                $('select').formSelect();
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}
function showSelectMarcas() {
    $.ajax({
        url: api + 'cargarSelectMarcas',
        type: 'post',
        data: null,
        datatype: 'json'
    })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    let content = '';
                    result.dataset.forEach(function (row) {
                        content += `<option value="${row.Id_marca}">${row.Marca}</option>`;
                    });
                    $('#create_marca').html(content);
                } else {
                    $('#create_marca').html('<option value="">No hay opciones</option>');
                }
                $('select').formSelect();
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}

function showSelectGenero() {
    $.ajax({
        url: api + 'cargarSelectGenero',
        type: 'post',
        data: null,
        datatype: 'json'
    })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    let content = '';
                    result.dataset.forEach(function (row) {
                        content += `<option value="${row.Id_genero}">${row.Genero}</option>`;
                    });
                    $('#create_genero').html(content);
                } else {
                    $('#create_genero').html('<option value="">No hay opciones</option>');
                }
                $('select').formSelect();
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}

// Función para llenar tabla con los datos de los registros
function fillTable(rows) {
    let content = '';
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        content +=
            `
            <tr>
                <td><img src="../../resources/img/productos/${row.Foto}" class="materialboxed" height="100"></td>
                <td>${row.Producto}</td>
                <td>${row.Categoria}</td>
                <td>${row.Talla}</td>
                <td>${row.Genero}</td>
                <td>${row.Marca}</td>
            </tr>
        `;
    });
    $('#tbody-read').html(content);
    table('#tabla_productos');
    $('.materialboxed').materialbox();
    $('.tooltipped').tooltip();
}

// Función para obtener y mostrar los registros disponibles
function showTable() {
    $.ajax({
        url: api + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (!result.status) {
                    sweetAlert(4, result.exception, null);
                }
                fillTable(result.dataset);
            } else {
              sweetAlert(2, response, null);
              //console.log(response);
            }
        })
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}

// Función para mostrar los resultados de una búsqueda
$('#form-search').submit(function () {
    event.preventDefault();
    $.ajax({
        url: api + 'search',
        type: 'post',
        data: $('#form-search').serialize(),
        datatype: 'json'
    })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    fillTable(result.dataset);
                    sweetAlert(1, result.message, null);
                } else {
                    sweetAlert(3, result.exception, null);
                }
            } else {
              sweetAlert(2, response, null);
              //console.log(response);
            }
        })
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
})

// Función para mostrar formulario en blanco
function modalCreate() {
    $('#form-create')[0].reset();
    fillSelect(categorias, 'create_categoria', null);
    fillSelect(Talla, 'create_talla', null);
    fillSelect(Genero, 'create_genero', null);
    fillSelect(Marca, 'create_marca', null);
    $('#modal-create').modal('open');
}

// Función para crear un nuevo registro
$('#form-create').submit(function ()
{
    event.preventDefault();
    $.ajax({
        url: api + 'create',
        type: 'post',
        data: new FormData($('#form-create')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    $('#form-create')[0].reset();
                    $('#modal-create').modal('close');
                    if (result.status == 1) {
                        sweetAlert(1, 'Producto satisfactorio',null);
                    } else if (result.status == 2) {
                        sweetAlert(3, 'Producto creado ' + result.exception, null);
                    }
                    showTable();
                } else {
                    sweetAlert(2, result.exception, null);
                }
            } else {
              sweetAlert(2, response, null);
              //console.log(response);
            }
        })
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
})

// Función para mostrar formulario con registro a modificar
function modalUpdate(id) {
    $.ajax({
        url: api + 'get',
        type: 'post',
        data: {
            id_producto: id
        },
        datatype: 'json'
    })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
                if (result.status) {
                    $('#form-update')[0].reset();
                    $('#id_producto').val(result.dataset.id_producto);
                    $('#foto').val(result.dataset.foto);
                    $('#update_producto').val(result.dataset.Producto);
                    $('#update_talla').val(result.dataset.Id_talla);
                    $('#update_genero').val(result.dataset.Id_genero);
                    $('#update_marca').val(result.dataset.Id_marca);
                    (result.dataset.estado_producto == 1) ? $('#update_estado').prop('checked', true) : $('#update_estado').prop('checked', false);
                    fillSelect(categorias, 'update_categoria', result.dataset.id_categoria);
                    M.updateTextFields();
                    $('#modal-update').modal('open');
                } else {
                    sweetAlert(2, result.exception, null);
                }
            } else {
              sweetAlert(2, response, null);
              //console.log(response);
            }
        })
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}

// Función para modificar un registro seleccionado previamente
$('#form-update').submit(function () {
    event.preventDefault();
    $.ajax({
        url: api + 'update',
        type: 'post',
        data: new FormData($('#form-update')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    $('#modal-update').modal('close');
                    showTable();
                    sweetAlert(1, result.message, null);
                } else {
                    sweetAlert(2, result.exception, null);
                }
            } else {
              sweetAlert(2, response, null);
              //console.log(response);
            }
        })
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
})
