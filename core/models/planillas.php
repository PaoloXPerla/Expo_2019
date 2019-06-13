<?php
//Aqui se maneja una variable ya establecida por php al agarrar la fecha del dia de hoy
date_default_timezone_set("America/El_Salvador");
class Planillas extends Validator
{
  //Declaración de propiedades para la api de planillas
  private $id = null;
	private $usuario = null;
	private $estado = null;
	private $fecha = null;
  private $valuesearch;
  public function setId($value)
  //Metodos para sobrecarga de propiedades para la api de planillas
  {
    if ($this->validateId($value)) {
      $this->id = $value;
      return true;
    } else {
      return false;
    }
  }

  public function getId()
  {
    return $this->id;
  }
  public function setUsuario($value)
  {
    if ($this->validateId($value)) {
      $this->usuario = $value;
      return true;
    } else {
      return false;
    }
  }

  public function getUsuario()
  {
    return $this->usuario;
  }
  public function setEstado($value)
  {
    if ($this->validateId($value)) {
      $this->estado = $value;
      return true;
    } else {
      return false;
    }
  }

  public function getEstado()
  {
    return $this->estado;
  }
  public function getFecha()
  {
    return $this->fecha;
  }
  public function searchvalue($value){
      if($this->validateAlphanumeric($value,1,150)){
          $this->valuesearch=$value;
          return true;
      }
      else{
          return false;
      }
  }
  public function setFecha($value)
  {
    if ($this->validateAlphanumeric($value)) {
      $this->fecha = $value;
      return true;
    } else {
      return false;
    }
  }
  //Metodos para el manejo del CRUD de la tabla planillas
  public function readUsuarios()
	{
		$sql = 'SELECT Id_usuario ,Usuario FROM usuarios';
		$params = array(null);
		return Database::getRows($sql, $params);
	}
  public function readEstado()
	{
		$sql = 'SELECT Id_estado , Estado FROM estado_planillas';
		$params = array(null);
		return Database::getRows($sql, $params);
	}
  public function readPlanillasUsu()
	{
		$sql = 'SELECT estado_planillas.Estado, planillas.Id_planilla, planillas.Fecha_pago, usuarios.Nombre
    FROM ((planillas INNER JOIN usuarios ON planillas.Id_usuario=usuarios.Id_usuario )
    INNER JOIN estado_planillas ON planillas.Id_estado=estado_planillas.Id_estado) ORDER BY usuarios.Nombre';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

  public function readPlanillas()
  {
    $sql='SELECT estado_planillas.Estado, planillas.Id_planilla, planillas.Fecha_pago, usuarios.Nombre FROM ((planillas INNER JOIN usuarios ON planillas.Id_usuario=usuarios.Id_usuario ) INNER JOIN estado_planillas ON planillas.Id_estado=estado_planillas.Id_estado)';
    $params = array(null);
    return Database::getRows($sql, $params);
  }
  public function searchPlanillas()
  {
    $sql = 'SELECT planillas.Id_planilla,planillas.Id_planilla,estado_planillas.Estado, planillas.Id_planilla, planillas.Fecha_pago, usuarios.Nombre
    FROM ((planillas INNER JOIN usuarios ON planillas.Id_usuario=usuarios.Id_usuario )
    INNER JOIN estado_planillas ON planillas.Id_estado=estado_planillas.Id_estado) WHERE usuarios.Nombre LIKE ? OR planillas.Fecha_pago LIKE ?';
    $params = array("%$this->valuesearch%", "%$this->valuesearch%");
    return Database::getRows($sql, $params);
  }
  public function createPlanillas()
  {
    $sql = 'INSERT INTO planillas(Fecha_pago, Id_usuario, Id_estado) VALUES(?, ?, ?)';
		$params = array( $today = date('Y-m-d'), $this->usuario, $this->estado);
		return Database::executeRow($sql, $params);
  }
  public function getPlanillass()
	{
		$sql = 'SELECT Id_planilla, Fecha_pago, Estado, Nombre FROM planillas WHERE Id_planilla = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}
}
?>
