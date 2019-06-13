<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/sucursales.php');
//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['action'])) {
	session_start();
	$sucursal = new Sucursales;
	$result = array('status' => 0, 'exception' => '');
	//Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['idUsuario'])) {
		switch ($_GET['action']) {
			//Aqui es en donde lee si hay alguna sucursal existente
			case 'read':
				if ($result['dataset'] = $sucursal->readSucursales()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'No hay sucursales registradas';
				}
				break;
				//Aqui  es en donde se realizar la opcion de buscar sucursal
			case 'search':
				$_POST = $sucursal->validateForm($_POST);
				if ($_POST['busqueda'] != '') {
					if ($result['dataset'] = $sucursal->searchSucursales($_POST['busqueda'])) {
						$result['status'] = 1;
					} else {
						$result['exception'] = 'No hay coincidencias';
					}
				} else {
					$result['exception'] = 'Ingrese un valor para buscar';
				}
				break;
				//Aqui es en donde se realiza la opcion de crear sucursales
			case 'create':
				$_POST = $sucursal->validateForm($_POST);
        		if ($sucursal->setSucursal($_POST['create_sucursal'])) {
						if ($sucursal->createSucursal()) {
							} else {
								$result['exception'] = 'Operación fallida';
							}
				} else {
					$result['exception'] = 'Nombre incorrecto';
				}
            	break;
							//Aqui es en donde se obtiene los datos de las sucursales
            case 'get':
                if ($sucursal->setId($_POST['id_sucursal'])) {
                    if ($result['dataset'] = $sucursal->getSucursal2()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Sucursal inexistente';
                    }
                } else {
                    $result['exception'] = 'Sucursal incorrecta';
                }
            	break;
                            //Aqui es en donde se puede modificar alguna sucursal existente
                case 'update':
                    $_POST = $sucursal->validateForm($_POST);
                    if ($sucursal->setId($_POST['id_sucursal'])) {
                        if ($sucursal->getSucursal2()) {
                            if ($sucursal->setSucursal($_POST['update_sucursal'])) {
                                            if ($sucursal->updateSucursal()) {
                                                $result['status'] = 1;
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }

                            } else {
                                $result['exception'] = 'Nombre sucursal incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Sucursal inexistente';
                        }
                    } else {
                        $result['exception'] = 'Sucursal incorrecta';
                    }
                    break;
							//Aqui es en donde se puede eliminar alguna sucursal existente
            case 'delete':
				if ($sucursal->setId($_POST['id_sucursal'])) {
					if ($sucursal->getSucursal2()) {
						if ($sucursal->deleteSucursal()) {
							$result['status'] =1;
							$result['exception'] = 'Se a borrado el registro';
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Sucursal inexistente';
					}
				} else {
					$result['exception'] = 'Sucursal incorrecta';
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
