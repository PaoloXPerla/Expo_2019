<?php
class Tallas extends Validator
{
	//Declaración de propiedades para la api de tallas
	private $id = null;
	private $talla = null;
	//Métodos para sobrecarga de propiedades para la api de tallass
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

	public function setTalla($value)
	{
		if($this->validateAlphanumeric($value, 1, 50)) {
			$this->talla= $value;
			return true;
		} else {
			return false;
		}
	}

	public function getTalla()
	{
		return $this->talla;
	}

	//Metodos para el manejo del CRUD de la tabla de tallas
	public function readTalla()
	{
		$sql = 'SELECT Id_talla, Talla FROM Tallas ORDER BY Talla';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchTalla($value)
	{
		$sql = 'SELECT * FROM tallas WHERE Talla LIKE ? ORDER BY Talla';
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}

	public function createTalla()
	{
		$sql = 'INSERT INTO tallas(Talla) VALUES(?)';
		$params = array($this->talla);
		return Database::executeRow($sql, $params);
	}

	public function getTalla2()
	{
		$sql = 'SELECT Id_talla, Talla FROM tallas WHERE Id_talla = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateTalla()
	{
		$sql = 'UPDATE tallas SET Talla= ? WHERE Id_talla = ?';
		$params = array($this->talla, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteTalla()
	{
		$sql = 'DELETE FROM tallas WHERE Id_talla= ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
