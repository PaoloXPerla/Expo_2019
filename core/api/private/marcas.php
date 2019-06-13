<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/marcas.php');
//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['action'])) {
	session_start();
	$marca = new Marcas;
	$result = array('status' => 0, 'exception' => '');
	//Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['idUsuario'])) {
		switch ($_GET['action']) {
			//Aqui es en donde lee si hay alguna marca existente
			case 'read':
				if ($result['dataset'] = $marca->readMarca()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'No hay marcas registradas';
				}
				break;
				//Aqui  es en donde se realizar la opcion de buscar marcas
			case 'search':
				$_POST = $marca->validateForm($_POST);
				if ($_POST['busqueda'] != '') {
					if ($result['dataset'] = $marca->searchMarca($_POST['busqueda'])) {
						$result['status'] = 1;
					} else {
						$result['exception'] = 'No hay coincidencias';
					}
				} else {
					$result['exception'] = 'Ingrese un valor para buscar';
				}
				break;
				//Aqui es en donde se realiza la opcion de crear marcas
			case 'create':
				$_POST = $marca->validateForm($_POST);
        		if ($marca->setMarca($_POST['create_marca'])) {
						if ($marca->createMarca()) {
							} else {
								$result['exception'] = 'Operación fallida';
							}
				} else {
					$result['exception'] = 'Nombre incorrecto';
				}
            	break;
							//Aqui es en donde se obtiene los datos de las marcas
            case 'get':
                if ($marca->setId($_POST['id_marca'])) {
                    if ($result['dataset'] = $marca->getMarca2()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Marca inexistente';
                    }
                } else {
                    $result['exception'] = 'Marca incorrecta';
                }
            	break;
                            //Aqui es en donde se puede modificar alguna marca existente
                case 'update':
                    $_POST = $marca->validateForm($_POST);
                    if ($marca->setId($_POST['id_marca'])) {
                        if ($marca->getMarca2()) {
                            if ($marca->setMarca($_POST['update_marca'])) {
                                            if ($marca->updateMarca()) {
                                                $result['status'] = 1;
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }

                            } else {
                                $result['exception'] = 'Nombre marca incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Marca inexistente';
                        }
                    } else {
                        $result['exception'] = 'Marca incorrecta';
                    }
                    break;
							//Aqui es en donde se puede eliminar alguna marca existente
            case 'delete':
				if ($marca->setId($_POST['id_marca'])) {
					if ($marca->getMarca2()) {
						if ($marca->deleteMarca()) {
							$result['status'] =1;
							$result['exception'] = 'Se a borrado el registro';
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Marca inexistente';
					}
				} else {
					$result['exception'] = 'Marca incorrecta';
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
