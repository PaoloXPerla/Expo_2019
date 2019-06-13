$(document).ready(function()
{
    //Aqui es en donde se junta la funcion con el campo del view
    showTable();
    showSelectUsuarios('create_usuario', null);
    showSelectEstado('create_estado', null);
})


//Constante para establecer la ruta y parámetros de comunicación con la API
const apiPlanillas = '../../core/api/private/planillas.php?action=';

//Función para llenar tabla con los datos de los registros
function fillTable(rows)
{
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){

        content += `
            <tr>
                <td>${row.Fecha_pago}</td>
                <td>${row.Nombre}</td>
                <td>${row.Estado}</td>
            </tr>
            `;
    });
    $('#tbody-read').html(content);
    table('#tabla_planillas')
    $('.materialboxed').materialbox();
    $('.tooltipped').tooltip();
}
function showTable()
{
    $.ajax({
        url: apiPlanillas + 'readPlanillas',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (!result.status) {
                sweetAlert(4, result.exception, null);
            }
            fillTable(result.dataset);
        } else {
          sweetAlert(2, response, null);
          //console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
$('#form-search').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiPlanillas + 'search',
        type: 'post',
        data: $('#form-search').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                sweetAlert(4, 'Coincidencias: ' + result.dataset.length, null);
                fillTable(result.dataset);

            } else {
                sweetAlert(3, result.exception, null);
            }
        } else {
          sweetAlert(2, response, null);
          //console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})
//Funcion que lee la tabla padre y la devuelve en el combobox
function showSelectUsuarios(idSelect, value)
{
    $.ajax({
        url: apiPlanillas + 'readUsuarios',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione una opción</option>';
                }
                result.dataset.forEach(function(row){
                    if (row.Id_usuario != value) {
                        content += `<option value="${row.Id_usuario}">${row.Usuario}</option>`;
                    } else {
                        content += `<option value="${row.Id_usuario}" selected>${row.Usuario}</option>`;
                    }
                });
                $('#' + idSelect).html(content);
            } else {
                $('#' + idSelect).html('<option value="">No hay opciones</option>');
            }
            $('select').formSelect();
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
//Funcion que lee la tabla padre y la devuelve en el combobox
function showSelectEstado(idSelect, value)
{
    $.ajax({
        url: apiPlanillas + 'readEstado',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione una opción</option>';
                }
                result.dataset.forEach(function(row){
                    if (row.Id_estado != value) {
                        content += `<option value="${row.Id_estado}">${row.Estado}</option>`;
                    } else {
                        content += `<option value="${row.Id_estado}" selected>${row.Estado}</option>`;
                    }
                });
                $('#' + idSelect).html(content);
            } else {
                $('#' + idSelect).html('<option value="">No hay opciones</option>');
            }
            $('select').formSelect();
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
//Funcion para crear un nuevo registro
$('#form-create').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiPlanillas + 'create',
        type: 'post',
        data: new FormData($('#form-create')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#form-create')[0].reset();
                $('#modal-create').modal('close');
                if (result.status == 1) {
                    sweetAlert(1, 'Planilla correctamente', null);
                } else if (result.status == 2) {
                    sweetAlert(3, 'Planilla creada. ' + result.exception, null);
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
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})
