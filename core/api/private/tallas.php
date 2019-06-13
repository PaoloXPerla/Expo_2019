<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/tallas.php');
//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['action'])) {
	session_start();
	$talla = new Tallas;
	$result = array('status' => 0, 'exception' => '');
	//Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['idUsuario'])) {
		switch ($_GET['action']) {
			//Aqui es en donde lee si hay alguna talla existente
			case 'read':
				if ($result['dataset'] = $talla->readTalla()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'No hay tallas registradas';
				}
				break;
				//Aqui  es en donde se realizar la opcion de buscar tallas
			case 'search':
				$_POST = $talla->validateForm($_POST);
				if ($_POST['busqueda'] != '') {
					if ($result['dataset'] = $talla->searchTalla($_POST['busqueda'])) {
						$result['status'] = 1;
					} else {
						$result['exception'] = 'No hay coincidencias';
					}
				} else {
					$result['exception'] = 'Ingrese un valor para buscar';
				}
				break;
				//Aqui es en donde se realiza la opcion de crear tallas
			case 'create':
				$_POST = $talla->validateForm($_POST);
        		if ($talla->setTalla($_POST['create_talla'])) {
						if ($talla->createTalla()) {
							} else {
								$result['exception'] = 'Operación fallida';
							}
				} else {
					$result['exception'] = 'Nombre incorrecto';
				}
            	break;
							//Aqui es en donde se obtiene los datos de las tallas
            case 'get':
                if ($talla->setId($_POST['id_talla'])) {
                    if ($result['dataset'] = $talla->getTalla2()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Talla inexistente';
                    }
                } else {
                    $result['exception'] = 'Talla incorrecta';
                }
            	break;
                            //Aqui es en donde se puede modificar alguna talla existente
                case 'update':
                    $_POST = $talla->validateForm($_POST);
                    if ($talla->setId($_POST['id_talla'])) {
                        if ($talla->getTalla2()) {
                            if ($talla->setTalla($_POST['update_talla'])) {
                                            if ($talla->updateTalla()) {
                                                $result['status'] = 1;
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }

                            } else {
                                $result['exception'] = 'Nombre talla incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Talla inexistente';
                        }
                    } else {
                        $result['exception'] = 'Talla incorrecta';
                    }
                    break;
							//Aqui es en donde se puede eliminar alguna talla existente
            case 'delete':
				if ($talla->setId($_POST['id_talla'])) {
					if ($talla->getTalla2()) {
						if ($talla->deleteTalla()) {
							$result['status'] =1;
							$result['exception'] = 'Se a borrado el registro';
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Talla inexistente';
					}
				} else {
					$result['exception'] = 'Talla incorrecta';
				}
            	break;
			default:
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
