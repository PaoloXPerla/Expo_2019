<?php
class Usuarios extends Validator
{
	//Declaración de propiedades para la api de usuarios
	private $id = null;
	private $nombres = null;
	private $apellidos = null;
	private $correo = null;
	private $alias = null;
	private $clave = null;
	private $dui = null;
	//Métodos para sobrecarga de propiedades para la api de usuarios
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

	public function setNombres($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->nombres = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombres()
	{
		return $this->nombres;
	}

	public function setApellidos($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->apellidos = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getApellidos()
	{
		return $this->apellidos;
	}
	public function setDui($value)
	{
		if ($this->validateDui($value)) {
			$this->dui = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getDui()
	{
		return $this->dui;
	}
	public function setCorreo($value)
	{
		if ($this->validateEmail($value)) {
			$this->correo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCorreo()
	{
		return $this->correo;
	}

	public function setAlias($value)
	{
		if ($this->validateAlphanumeric($value, 1, 50)) {
			$this->alias = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getAlias()
	{
		return $this->alias;
	}

	public function setClave($value)
	{
		if ($this->validatePassword($value)) {
			$this->clave = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getClave()
	{
		return $this->clave;
	}

	//Métodos para manejar la sesión del usuario
	public function checkAlias()
	{
		$sql = 'SELECT Id_usuario FROM usuarios WHERE Usuario = ?';
		$params = array($this->alias);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->id = $data['Id_usuario'];
			return true;
		} else {
			return false;
		}
	}

	public function checkPassword()
	{
		$sql = 'SELECT Contraseña FROM usuarios WHERE Id_usuario = ?';
		$params = array($this->id);
		$data = Database::getRow($sql, $params);
		if (password_verify($this->clave, $data['Contraseña'])) {
			return true;
		} else {
			return false;
		}
	}

	public function changePassword()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'UPDATE usuarios SET Contraseña = ? WHERE Id_usuario = ?';
		$params = array($hash, $this->id);
		return Database::executeRow($sql, $params);
	}

	//Metodos para manejar el CRUD de la tabla usuarios
	public function readUsuarios()
	{
		$sql = 'SELECT Id_usuario, Nombre, Apellido, Correo, Usuario, Dui FROM usuarios ORDER BY Apellido';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchUsuarios($value)
	{
		$sql = 'SELECT Id_usuario, Nombre, Apellido, Correo, Usuario FROM usuarios WHERE Apellido LIKE ? OR Nombre LIKE ? ORDER BY Apellido';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createUsuario()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO usuarios(Nombre, Apellido, Correo, Usuario, Dui, Contraseña, Id_tipo_usuario) VALUES(?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->nombres, $this->apellidos, $this->correo, $this->alias,$this->dui, $hash, 1);
		return Database::executeRow($sql, $params);
	}

	public function getUsuario()
	{
		$sql = 'SELECT Id_usuario, Nombre, Apellido, Correo, Usuario, Dui  FROM usuarios WHERE Id_usuario = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateUsuario()
	{
		$sql = 'UPDATE usuarios SET Nombre = ?, Apellido = ?, Correo = ?, Usuario = ? , Dui = ? WHERE Id_usuario = ?';
		$params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $this->dui, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteUsuario()
	{
		$sql = 'DELETE FROM usuarios WHERE Id_usuario = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
