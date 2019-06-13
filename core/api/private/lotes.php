<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/lotes.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['action'])) {
    session_start();
    $lotes = new Lotes;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['idUsuario'])) {
        switch ($_GET['action']) {
          //Aqui es en donde se leen los lotes existentes
            case 'readLotes':
                if ($result['dataset'] = $lotes->readLotes()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay lotes registrados';
                }
                break;
                //Aqui es en se verifica si hay productos existentes
            case 'readProductos':
                if ($result['dataset'] = $lotes->readProductos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
                //Aqui es en donde se hace le funcionamiento de el boton de buscar
            case 'search':
                $_POST = $lotes->validateForm($_POST);
                if ($_POST['busqueda'] != '') {
                    if ($result['dataset'] = $lotes->searchLotes($_POST['busqueda'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
                //Aqui es en donde se realiza la opcion de crear un nuevo lote
            case 'create':
                $_POST = $lotes->validateForm($_POST);
                if ($lotes->setNumero($_POST['create_numero'])) {
                            if ($lotes->setProducto($_POST['create_producto'])) {
                              if ($lotes->createLotes()) {
                                $result['status']=1;
                              }else {
                                    $result['exception'] = 'Operación fallida';
                              }
                            } else {
                                $result['exception'] = 'Seleccione un producto';
                            }
                } else {
                    $result['exception'] = 'Debe ser un numero de 9 digitos';
                }
                break;
            default:
                exit('Acción no disponible');
              }
          } else {
        switch ($_GET['action']) {
          //Aqui es en donde se leen los lotes existentes
            case 'readProductos':
                if ($result['dataset'] = $lotes->readProductos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Contenido no disponible';
                }
                break;
                //Aqui es en donde se leen los lotes existentes
            case 'readLotes':
                if ($lotes->setProducto($_POST['id_producto'])) {
                    if ($result['dataset'] = $lotes->readProductosLotes()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Contenido no disponible';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
                //Aqui es en donde se verifica el detalle de los lotes
            case 'detailLotes':
                if ($lotes->setId($_POST['id_lote'])) {
                    if ($result['dataset'] = $lotes->getLotes()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Contenido no disponible';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
              }
          }
          print(json_encode($result));
        } else {
        exit('Recurso denegado');
        }
        ?>
