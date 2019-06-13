<?php
//Aqui se muestran todas las validaciones para el programa
class Validator
{
	//Aqui se crea la validacion de la imagen
	private $imageError = null;
	private $imageName = null;

	public function getImageName()
	{
		return $this->imageName;
	}

	public function getImageError()
	{
		switch ($this->imageError) {
			case 1:
				$error = 'El tipo de la imagen debe ser gif, jpg o png';
				break;
			case 2:
				$error = 'La dimensión de la imagen es incorrecta';
				break;
			case 3:
				$error = 'El tamaño de la imagen debe ser menor a 2MB';
				break;
			case 4:
				$error = 'El archivo de la imagen no existe';
				break;
			default:
				$error = 'Ocurrió un problema con la imagen';
		}
		return $error;
	}
//Aqui se valida que los campos no esten vacios
	public function validateForm($fields)
	{
		foreach ($fields as $index => $value) {
			$value = trim($value);
			$fields[$index] = $value;
		}
		return $fields;
	}
//Aqui se muestra la validacion del id
	public function validateId($value)
	{
		if (filter_var($value, FILTER_VALIDATE_INT, array('min_range' => 1))) {
			return true;
		} else {
			return false;
		}
	}
//Aqui se hace la validacion de las caracterisitcas que debe de poseer la imagen para poder ser guardad en la base
	public function validateImageFile($file, $path, $name, $maxWidth, $maxHeigth)
	{
		if ($file) {
	     	if ($file['size'] <= 2097152) {
		    	list($width, $height, $type) = getimagesize($file['tmp_name']);
				if ($width <= $maxWidth && $height <= $maxHeigth) {
					//Tipos de imagen: 1 - GIF, 2 - JPG y 3 - PNG
					if ($type == 1 || $type == 2 || $type == 3) {
						if ($name) {
							$this->imageName = $name;
							if (!file_exists($path.$name)) {
								$this->imageError = 4;
							}
								return true;
						} else {
							$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
							$this->imageName = uniqid().'.'.$extension;
							return true;
						}
					} else {
						$this->imageError = 1;
						return false;
					}
				} else {
					$this->imageError = 2;
					return false;
				}
	     	} else {
				$this->imageError = 3;
				return false;
	     	}
		} else {
			if (file_exists($path.$name)) {
				$this->imageName = $name;
				return true;
			} else {
				$this->imageError = 4;
				return false;
			}
		}
	}
//Aqui se hace la validacion del correo electronico
	public function validateEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	}
//Aqui se hace la validacion de campos que requieran datos alfabeticos
	public function validateAlphabetic($value, $minimum, $maximum)
	{
		if (preg_match('/^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'.$minimum.','.$maximum.'}$/', $value)) {
			return true;
		} else {
			return false;
		}
	}
//Aqui se hace la validacion de campos que requieran datos alfanumericos
	public function validateAlphanumeric($value, $minimum, $maximum)
	{
		if (preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s\.]{'.$minimum.','.$maximum.'}$/', $value)) {
			return true;
		} else {
			return false;
		}
	}
//Aqui se hace la validacion de el dinero
	public function validateMoney($value)
	{
		if (preg_match('/^[0-9]+(?:\.[0-9]{1,2})?$/', $value)) {
			return true;
		} else {
			return false;
		}
	}
	//Aqui se crea la validacion del dui
	public function validateDui($value)
	{
		if (preg_match('/^[0-9]{9}$/', $value)) {
			return true;
		} else {
			return false;
		}
	}
		//Aqui se crea la validacion de cantidad de producos de algun lote, etc.
	public function validateCantidad($value)
	{
		if (preg_match('/^[0-9]{2}$/', $value)) {
			return true;
		} else {
			return false;
		}
	}
	//Aqui validaremos que no pase de 100
	public function ValidateCount($value){
		if(strlen($value)>=100){
			return false;
		}
		else{
				if(preg_match('/^\d+$/', $value)){
					return true;
				}
				else {
					return false;
				}
		}
	}
	//Aqui se crea la validacion de la contraseña
	public function validatePassword($value)
	{
		if (strlen($value) > 5) {
			return true;
		} else {
			return false;
		}
	}
	//Aqui es en donde verica si el archivo existe y si es asi lo guarda
	public function saveFile($file, $path, $name)
    {
		if (file_exists($path)) {
			if (move_uploaded_file($file['tmp_name'], $path.$name)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
  	}
	//Aqui es en donde se crea la funcion de borrar el archivo
	public function deleteFile($path, $name)
    {
		if (file_exists($path)) {
			if (unlink($path.$name)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}

?>
