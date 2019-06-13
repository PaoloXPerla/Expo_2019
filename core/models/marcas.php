<?php
class Marcas extends Validator
{
	//Declaración de propiedades para la api de marcas
	private $id = null;
	private $marca = null;
	//Métodos para sobrecarga de propiedades para la api de marcas
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

	public function setMarca($value)
	{
		if($this->validateAlphanumeric($value, 1, 50)) {
			$this->marca = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getMarca()
	{
		return $this->marca;
	}

	//Metodos para el manejo del CRUD de la tabla de marcas
	public function readMarca()
	{
		$sql = 'SELECT Id_marca, Marca FROM marcas ORDER BY Marca';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchMarca($value)
	{
		$sql = 'SELECT * FROM marcas WHERE Marca LIKE ? ORDER BY Marca';
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}

	public function createMarca()
	{
		$sql = 'INSERT INTO marcas(Marca) VALUES(?)';
		$params = array($this->marca);
		return Database::executeRow($sql, $params);
	}

	public function getMarca2()
	{
		$sql = 'SELECT Id_marca, Marca FROM marcas WHERE Id_marca = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateMarca()
	{
		$sql = 'UPDATE marcas SET Marca = ? WHERE Id_marca = ?';
		$params = array($this->marca, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteMarca()
	{
		$sql = 'DELETE FROM marcas WHERE Id_marca= ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
