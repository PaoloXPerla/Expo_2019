<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/usuarios.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['action'])){
    session_start();
    $usuario = new Usuarios;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idUsuario'])) {
        switch ($_GET['action']) {
          //Cuando se haya iniciado sesion el usuarios podra salir
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../../view/private/index.php');
                } else {
                    header('location: ../../../view/private/inicio.php');
                }
                break;
                //Caso para que cuando se haya inciado sesion lea los datos de la tabla de usuarios
            case 'readProfile':
                if ($usuario->setId($_SESSION['idUsuario'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
                case 'search':
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['busqueda'] != '') {
                        if ($result['dataset'] = $usuario->searchUsuarios($_POST['busqueda'])) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No hay coincidencias';
                        }
                    } else {
                        $result['exception'] = 'Ingrese un valor para buscar';
                    }
                    break;
                //Cuando se hayan leido los datos de la base de datos el usuario podra editar el perfil
            case 'editProfile':
                if ($usuario->setId($_SESSION['idUsuario'])) {
                    if ($usuario->getUsuario()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNombres($_POST['profile_nombres'])) {
                            if ($usuario->setApellidos($_POST['profile_apellidos'])) {
                                if ($usuario->setCorreo($_POST['profile_correo'])) {
                                    if ($usuario->setAlias($_POST['profile_alias'])) {
                                      if ($usuario->setDui($_POST['profile_dui'])) {
                                        if ($usuario->updateUsuario()) {
                                            $_SESSION['usuarioCliente'] = $_POST['profile_alias'];
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                      } else {
                                          $result['exception'] = 'Dui incorrecto';
                                      }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
                //Aqui es en donde el usuarios puede cambiar la contraseña
            case 'password':
                if ($usuario->setId($_SESSION['idUsuario'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($usuario->setClave($_POST['clave_actual_1'])) {
                            if ($usuario->checkPassword()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                        if ($usuario->changePassword()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave nueva menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave actual menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
                //Aqui se leen los usuarios que se encuentran en la base de datos
                case 'readUsuarios':
                    if ($result['dataset'] = $usuario->readUsuarios()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay usuarios registrados';
                    }
                    break;
                    //Aqui es en donde se realiza el funcionamiento de la opcion de buscar usuarios
                case 'search':
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['busqueda'] != '') {
                        if ($result['dataset'] = $usuario->searchUsuarios($_POST['busqueda'])) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No hay coincidencias';
                        }
                    } else {
                        $result['exception'] = 'Ingrese un valor para buscar';
                    }
                    break;
                    //Aqui es en donde se pueden crear usuarios
                case 'create':
                    $_POST = $usuario->validateForm($_POST);
                    if ($usuario->setNombres($_POST['create_nombres'])) {
                        if ($usuario->setApellidos($_POST['create_apellidos'])) {
                            if ($usuario->setCorreo($_POST['create_correo'])) {
                                if ($usuario->setAlias($_POST['create_alias'])) {
                                    if ($_POST['create_clave1'] == $_POST['create_clave2']) {
                                        if ($usuario->setClave($_POST['create_clave1'])) {
                                            if ($usuario->setDui($_POST['create_dui'])) {
                                            if ($usuario->createUsuario()) {
                                                $result['status'] = 1;
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }
                                        } else {
                                            $result['exception'] = 'Dui no aceptado';
                                            }
                                        } else {
                                            $result['exception'] = 'Clave menor a 6 caracteres';
                                        }
                                    } else {
                                        $result['exception'] = 'Claves diferentes';
                                    }
                                } else {
                                    $result['exception'] = 'Alias incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Correo incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Apellidos incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Nombres incorrectos';
                    }
                    break;
                    //Aqui es en donde se obtiene el usuario por su id
                case 'get':
                    if ($usuario->setId($_POST['id_usuario'])) {
                        if ($result['dataset'] = $usuario->getUsuario()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                    break;
                    //Aqui es en donde se modifican los datos de los usuarios
                case 'update':
                    $_POST = $usuario->validateForm($_POST);
                    if ($usuario->setId($_POST['id_usuario'])) {
                        if ($usuario->getUsuario()) {
                            if ($usuario->setNombres($_POST['update_nombres'])) {
                                if ($usuario->setApellidos($_POST['update_apellidos'])) {
                                    if ($usuario->setCorreo($_POST['update_correo'])) {
                                        if ($usuario->setAlias($_POST['update_alias'])) {
                                          if ($usuario->setDui($_POST['update_dui'])) {
                                            if ($usuario->updateUsuario()) {
                                                $result['status'] = 1;
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }
                                          } else {
                                              $result['exception'] = 'Dui no aceptado';
                                          }
                                        } else {
                                            $result['exception'] = 'Alias incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Correo incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Apellidos incorrectos';
                                }
                            } else {
                                $result['exception'] = 'Nombres incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                    break;
                    //Aqui es en donde se puede realizar la funcion de eliminar los usuarios
                case 'delete':
                    if ($_POST['id_usuario'] != $_SESSION['idUsuario']) {
                        if ($usuario->setId($_POST['id_usuario'])) {
                            if ($usuario->getUsuario()) {
                                if ($usuario->deleteUsuario()) {
                                    $result['status'] = 1;
                                } else {
                                    $result['exception'] = 'Operación fallida';
                                }
                            } else {
                                $result['exception'] = 'Usuario inexistente';
                            }
                        } else {
                            $result['exception'] = 'Usuario incorrecto';
                        }
                    } else {
                        $result['exception'] = 'No se puede eliminar a sí mismo';
                    }
                    break;
                default:
                    exit('Acción no disponible');
                  }
              } else {
        switch ($_GET['action']) {
          //Aqui es en donde se realiza la funcion para ver si existe un usuario igual a la hora de reaizar el login
          case 'register':
              $_POST = $usuario->validateForm($_POST);
              if ($usuario->setNombres($_POST['nombres'])) {
                  if ($usuario->setApellidos($_POST['apellidos'])) {
                      if ($usuario->setCorreo($_POST['mail'])) {
                          if ($usuario->setAlias($_POST['usu'])) {
                              if ($_POST['contra1'] == $_POST['contra2']) {
                                  if ($usuario->setClave($_POST['contra1'])) {
                                    if($usuario->setDui($_POST['dui'])) {
                                      if ($usuario->createUsuario()) {
                                          $result['status'] = 1;
                                      } else {
                                          $result['exception'] = 'Operación fallida';
                                      }
                                    } else {
                                        $result['exception'] = 'Dui no aceptado';
                                    }
                                  } else {
                                      $result['exception'] = 'Clave menor a 6 caracteres';
                                  }
                              } else {
                                  $result['exception'] = 'Claves diferentes';
                              }
                          } else {
                              $result['exception'] = 'Alias incorrecto';
                          }
                      } else {
                          $result['exception'] = 'Correo incorrecto';
                      }
                  } else {
                      $result['exception'] = 'Apellidos incorrectos';
                  }
              } else {
                  $result['exception'] = 'Nombres incorrectos';
              }
              break;
              //Aqui es en donde se hace el login , verificando si hay un usuario existente a lo insertado
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setAlias($_POST['usuario'])) {
                    if ($usuario->checkAlias()) {
                        if ($usuario->setClave($_POST['contra'])) {
                            if ($usuario->checkPassword()) {
                                $_SESSION['idUsuario'] = $usuario->getId();
                                $_SESSION['aliasUsuario'] = $usuario->getAlias();
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Clave inexistente';
                            }
                        } else {
                            $result['exception'] = 'Clave menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Alias inexistente';
                    }
                } else {
                    $result['exception'] = 'Alias incorrecto';
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
