<?php
class Productos extends Validator
{
 //Decalro las propiedades de la tabla
    private $id = null;
    private $producto = null;
    private $categoria = null;
    private $talla = null;
    private $genero = null;
    private $marca = null;
    private $ruta = "../../../resources/img/productos/";
    private $foto = null;
    private $valuesearch;

 //metodos Post(set) y Get(sobrecargas)
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

    public function setCategoria($value)
    {
        if ($this->validateId($value)) {
            $this->categoria = $value;
            return true;
        }else {
            return false;
        }
    }

    public function getCategoria()
	{
		return $this->categoria;
    }

    public function setProducto($value)
	{
		if ($this->validateAlphabetic($value, 1,50)) {
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

    public function setTalla($value)
    {
        if ($this->validateId($value)) {
            $this->talla = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getTalla()
	{
		return $this->talla;
    }

    public function setGenero($value)
    {
        if ($this->validateId($value)) {
            $this->genero = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getGenero()
	{
		return $this->genero;
    }

    public function setMarca($value)
    {
        if ($this->validateId($value)) {
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

    public function getRuta()
	{
		return $this->ruta;
    }

    public function setFoto($file, $name)
    {
        if ($this->validateImageFile($file, $this->ruta, $name, 500, 500)) {
            $this->foto = $this->getImageName();
            return true;
        } else {
            return false;
        }
    }

    public function getFoto()
	{
		return $this->foto;
    }

    public function searchvalue($value){
        if($this->validateAlphanumeric($value, 1, 150)){
            $this->valuesearch=$value;
            return true;
        }
        else{
            return false;
        }
    }

 //Metodos y consultas para los SCRUD
     public function readCategorias()
    {
        $sql = 'SELECT Id_categoria, Categoria FROM categorias';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function readTalla()
    {
        $sql = 'SELECT Id_talla, Talla FROM tallas';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function readMarcas(){
        $sql = 'SELECT Id_marca, Marca FROM marcas';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function readGenero(){
        $sql = 'SELECT Id_genero, Genero FROM generos';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function readTablaProductos()
    {
        $sql = 'SELECT productos.Foto, productos.Producto, categorias.Categoria,
            tallas.Talla, generos.Genero, marcas.Marca FROM productos INNER JOIN
            categorias ON productos.Id_categoria = categorias.Id_categoria INNER JOIN
            tallas ON productos.Id_talla = tallas.Id_talla INNER JOIN
            generos ON productos.Id_genero = generos.Id_genero INNER JOIN
            marcas ON productos.Id_marca = marcas.Id_marca ORDER BY productos.Producto';
        $params = array($this->categoria);
        return Database::getRows($sql, $params);
    }

    public function readProductos()
	{
		$sql = 'SELECT productos.Foto, productos.Producto, categorias.Categoria,
            tallas.Talla, generos.Genero, marcas.Marca FROM productos INNER JOIN
            categorias ON productos.Id_categoria = categorias.Id_categoria INNER JOIN
            tallas ON productos.Id_talla = tallas.Id_talla INNER JOIN
            generos ON productos.Id_genero = generos.Id_genero INNER JOIN
            marcas ON productos.Id_marca = marcas.Id_marca ORDER BY productos.Producto';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchProductos()
	{
		$sql = 'SELECT productos.Foto, productos.Producto, categorias.Categoria,
            tallas.Talla, generos.Genero, marcas.Marca FROM productos INNER JOIN
            categorias ON productos.Id_categoria = categorias.Id_categoria INNER JOIN
            tallas ON productos.Id_talla = tallas.Id_talla INNER JOIN
            generos ON productos.Id_genero = generos.Id_genero INNER JOIN
            marcas ON productos.Id_marca = marcas.Id_marca ORDER BY productos.Producto
            WHERE productos.Producto LIKE  %? ';
		$params = array();
		return Database::getRows($sql, $params);
	}

	public function createProducto()
	{
		$sql = 'INSERT INTO productos(Id_categoria, Producto, Id_talla, Id_genero, Id_marca, Foto) VALUES(?, ?, ?, ?, ?, ?)';
		$params = array($this->categoria, $this->producto, $this->talla, $this->genero, $this->marca, $this->foto);
		return Database::executeRow($sql, $params);
	}

	public function getProducto_consulta()
	{
		$sql = 'SELECT Id_producto, Id_categoria, Producto, Id_talla, Id_genero, Id_marca FROM productos WHERE Id_producto = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateProducto()
	{
		$sql = 'UPDATE productos SET Id_categoria = ?, Producto = ?, Id_talla= ?, Id_genero = ?, Id_marca WHERE Id_producto = ?';
		$params = array($this->categoria, $this->producto, $this->talla, $this->genero, $this->marca);
		return Database::executeRow($sql, $params);
	}

	public function deleteProducto()
	{
		$sql = 'DELETE FROM productos WHERE Id_producto = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
