
//Constante para establecer la ruta y parámetros de comunicación con la API
const api = '../../core/api/private/usuarios.php?action=';

//Función para validar el usuario al momento de iniciar sesión
$('#form-registrar').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: api+'register',
        type: 'post',
        data: $('#form-registrar').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
            if (dataset.status) {
                sweetAlert(1, 'Bienvenido a Ubebi', 'index.php');
            } else {
                sweetAlert(2, dataset.exception, null);
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
