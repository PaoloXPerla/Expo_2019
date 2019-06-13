<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/productos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $producto = new Productos();
    $result = array('status' => 0, 'exception' => '');
    // Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idUsuario'])) {
        switch ($_GET['action']) {
                //Determinamos los reads para la demas tablas que se unen a productos
            case 'cargarSelectCategoria':
                if ($result['dataset'] = $producto->readCategorias()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay categorias registrados';
                }
                break;

             case 'cargarSelectTalla':
                if ($result['dataset'] = $producto->readTalla()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay tallas registradas';
                }
                break;

            case 'cargarSelectMarcas':
                if ($result['dataset'] = $producto->readMarcas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay Marcas registradas';
                }
                break;

            case 'cargarSelectGenero':
                if ($result['dataset'] = $producto->readGenero()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay Marcas registradas';
                }
                break;

                //Se leen los productos existentes
            case 'read':
                if ($result['dataset'] = $producto->readProductos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
                //Aqui se da el funcionamiento del boton buscar
            case 'search':
                if ($producto->searchvalue($_POST['busqueda'])) {
                    if ($result['dataset'] = $producto->searchProductos()) {
                        $result['status'] = 1;
                    } else {
                        $result['execption'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Busqueda invalida';
                }
                break;
                //Aqui se realiza la opcion crear
            case 'create':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setProducto($_POST['create_producto'])) {
                    if ($producto->setCategoria($_POST['create_categoria'])) {
                        if ($producto->setTalla($_POST['create_talla'])) {
                            if ($producto->setGenero($_POST['create_genero'])) {
                                if ($producto->setMarca($_POST['create_marca'])) {
                                    if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                        if ($producto->setFoto($_FILES['create_archivo'], null)){
                                            if ($producto->createProducto()) {
                                                if ($producto->saveFile($_FILES['create_archivo'], $producto->getRuta(), $producto->getFoto())) {
                                                    $result['status'] = 1;
                                                } else {
                                                    $result['status'] = 2;
                                                    $result['exception'] = 'No se guardo el archivo';
                                                }
                                            } else {
                                                $result['exception'] = 'Operacion fallida';
                                            }
                                        } else {
                                            $result['exception'] = $producto->getImageError();
                                        }
                                    } else {
                                        $result['exception'] = 'Sube una imagen';
                                    }
                                } else {
                                    $result['exception'] = 'Marca incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Genero incorrecto';
                            }
                        } else {
                            $result['exception']  = 'Talla incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Categoria incorrecta';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;

                //En esta parte se obtienen los datos de la base
            case 'get':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->getProducto_consulta()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
             //En esta parte se modificacn los registros existentes
            case 'update':
                $_POST = $producto->validateForm($_POST);
                    if ($producto->setId($_POST['id_producto'])) {

                    }
                    break;
            default:
              var_dump();
              exit('Acción no disponible');
            }
            } else {
            exit('Acceso no disponible');
            }
            print(json_encode($result));
            } else {
            exit('Recurso denegado');
            }
            ?>
