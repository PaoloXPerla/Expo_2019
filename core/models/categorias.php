<?php
class Categorias extends Validator
{
	//Declaración de propiedades para la api de categorias
	private $id = null;
	private $nombre = null;
	private $imagen = null;
	private $ruta = '../../../resources/img/categorias/';

	//Métodos para sobrecarga de propiedades para la api de categorias
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

	public function setNombre($value)
	{
		if($this->validateAlphanumeric($value, 1, 50)) {
			$this->nombre = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setImagen($file, $name)
	{
		if ($this->validateImageFile($file, $this->ruta, $name, 500, 500)) {
			$this->imagen = $this->getImageName();
			return true;
		} else {
			return false;
		}
	}

	public function getImagen()
	{
		return $this->imagen;
	}

	public function getRuta()
	{
		return $this->ruta;
	}
	//Metodos para el manejo del CRUD de la tabla de categoriass
	public function readCategorias()
	{
		$sql = 'SELECT Id_categoria, Categoria, imagen  FROM categorias ORDER BY Categoria';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchCategorias($value)
	{
		$sql = 'SELECT * FROM categorias WHERE Categoria LIKE ? ORDER BY Categoria';
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}

	public function createCategoria()
	{
		$sql = 'INSERT INTO categorias(Categoria, Imagen) VALUES(?, ?)';
		$params = array($this->nombre, $this->imagen);
		return Database::executeRow($sql, $params);
	}

	public function getCategoria()
	{
		$sql = 'SELECT Id_categoria, Categoria, Imagen FROM categorias WHERE id_categoria = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateCategoria()
	{
		$sql = 'UPDATE categorias SET Categoria = ?, imagen = ? WHERE Id_categoria = ?';
		$params = array($this->nombre, $this->imagen, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteCategoria()
	{
		$sql = 'DELETE FROM categorias WHERE Id_categoria = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
