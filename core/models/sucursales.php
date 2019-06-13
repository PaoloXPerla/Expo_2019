<?php
class Sucursales extends Validator
{
	//Declaración de propiedades para la api de sucursales
	private $id = null;
	private $sucursal = null;
	//Métodos para sobrecarga de propiedades para la api de sucursales
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

	public function setSucursal($value)
	{
		if($this->validateAlphanumeric($value, 1, 50)) {
			$this->sucursal = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getSucursal()
	{
		return $this->sucursal;
	}

	//Metodos para el manejo del CRUD de la tabla de sucursales
	public function readSucursales()
	{
		$sql = 'SELECT Id_sucursal, Sucursal FROM sucursales ORDER BY Sucursal';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchSucursales($value)
	{
		$sql = 'SELECT * FROM sucursales WHERE Sucursal LIKE ? ORDER BY Sucursal';
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}

	public function createSucursal()
	{
		$sql = 'INSERT INTO sucursales(sucursal) VALUES(?)';
		$params = array($this->sucursal);
		return Database::executeRow($sql, $params);
	}

	public function getSucursal2()
	{
		$sql = 'SELECT Id_sucursal, sucursal FROM sucursales WHERE Id_sucursal = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateSucursal()
	{
		$sql = 'UPDATE sucursales SET sucursal = ? WHERE Id_sucursal = ?';
		$params = array($this->sucursal, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteSucursal()
	{
		$sql = 'DELETE FROM sucursales WHERE Id_sucursal= ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>