<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/planillas.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['action'])) {
    session_start();
    $planillas = new Planillas();
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['idUsuario'])) {
        switch ($_GET['action']) {
          //Aqui es en donde se leen las planillas existentes
            case 'readPlanillas':
                if ($result['dataset'] = $planillas->readPlanillas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay lotes registrados';
                }
                break;
                //Aqui es en se verifica si hay usuarios existentes
            case 'readUsuarios':
                if ($result['dataset'] = $planillas->readUsuarios()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
                //Aqui es en se verifica si hay estados existentes
                case 'readEstado':
                    if ($result['dataset'] = $planillas->readEstado()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay productos registrados';
                    }
                    break;
                //Aqui es en donde se hace le funcionamiento de el boton de buscar
                case 'search':
                  if($planillas->searchvalue($_POST['buscar'])){
                      if($result['dataset']=$planillas->searchPlanillas()){
                          $result['status']=1;
                      }
                      else{
                        $result['exception']='No hay coincidencias';
                      }
                  }
                  else{
                    $result['exception']='Busqueda invalida';
                  }
                break;
                //Aqui es en donde se realiza la opcion de crear una planilla
            case 'create':
                $_POST = $planillas->validateForm($_POST);
                    if ($planillas->setUsuario($_POST['create_usuario'])) {
                        if ($planillas->setEstado($_POST['create_estado'])) {
                          if ($planillas->createPlanillas()) {
                            $result['status']=1;
                            }
                            else {
                                $result['exception'] = 'Operación fallida';
                            }
                          }
                          else {
                              $result['exception'] = 'Inserte bien el usuario';
                          }
                    } else {
                        $result['exception'] = 'Inserte bien el estado';
                    }

                break;
            default:
                exit('Acción no disponible');
              }
          } else {
        switch ($_GET['action']) {
          //Aqui es en donde se leen las planillas existentes
            case 'readUsuarios':
                if ($result['dataset'] = $planillas->readUsuarios()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Contenido no disponible';
                }
                break;
                case 'readEstado':
                    if ($result['dataset'] = $planillas->readEstado()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Contenido no disponible';
                    }
                    break;
                //Aqui es en donde se leen las planillas existentes
                case 'readPlanillas':
                if ($planillas->setId($_POST['id_planilla'])) {
                    if ($result['dataset'] = $planillas->readPlanillasUsu()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Contenido no disponible';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
                //Aqui es en donde se verifica el detalle de la planilla
            case 'detailPlanillas':
                if ($planillas->setId($_POST['id_planilla'])) {
                    if ($result['dataset'] = $planillas->getPlanillas()) {
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
