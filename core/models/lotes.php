<?php
//Aqui se maneja una variable ya establecida por php al agarrar la fecha del dia de hoy
date_default_timezone_set("America/El_Salvador");
class Lotes extends Validator
{
	//Declaración de propiedades para la api de lotes
	private $id = null;
	private $numero = null;
	private $producto = null;
	private $fecha = null;
	//Métodos para sobrecarga de propiedades para la api de lotes
	public function setId($value)
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
	public function setNumero($value)
	{
		if ($this->validateDui($value)) {
			$this->numero = $value;
			return true;
		} else {
			return false;
		}
	}
	public function getNumero()
	{
		return $this->numero;
	}
	public function setProducto($value)
	{
		if ($this->validateId($value)) {
			$this->producto = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getProducto()
	{
		return $this->producto;
	}
	public function getFecha()
	{
		return $this->fecha;
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
		//Métodos para el manejo del CRUD de la tabla lotes
	public function readProductosLotes()
	{
		$sql = 'SELECT Producto, Id_lote, NumeroLote, Fecha_ingreso FROM lotes INNER JOIN productos USING(Id_producto) WHERE Id_producto = ? ORDER BY NumeroLote';
		$params = array($this->producto);
		return Database::getRows($sql, $params);
	}
	public function readLotes()
	{
		$sql = 'SELECT Id_lote, NumeroLote, Fecha_ingreso, Producto FROM lotes INNER JOIN productos USING(Id_producto) ORDER BY NumeroLote';
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchLotes($value)
{
	$sql = 'SELECT Id_lote,NumeroLote, Fecha_ingreso, Producto  FROM lotes INNER JOIN productos USING(Id_producto) WHERE Producto LIKE ? OR Fecha_ingreso LIKE ? ORDER BY NumeroLote';
	$params = array("%$value%", "%$value%");
	return Database::getRows($sql, $params);
}
	public function readProductos()
	{
		$sql = 'SELECT Id_producto ,Producto FROM productos';
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function createLotes()
	{
		$sql = 'INSERT INTO lotes(NumeroLote, Fecha_ingreso, Id_producto) VALUES(?, ?, ?)';
		$params = array($this->numero, $today = date('Y-m-d'), $this->producto);
		return Database::executeRow($sql, $params);
	}

	public function getLotes()
	{
		$sql = 'SELECT Id_lote, NumeroLote, Fecha_ingreso, Cantidad, Precio, Id_producto FROM lotes WHERE Id_lote = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}
}
?>
