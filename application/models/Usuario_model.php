<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends Centro_model {

	public $nombre;
	public $alias;
	public $usuario_tipo_id;
	public $empresa_id = null;

	public function __construct($id="")
	{
		parent::__construct();
		
		if (!empty($id)) {
			$this->cargar($id);
		}
	}

	public function login($datos)
	{
		$tmp = $this->db
		->where("alias", $datos->alias)
		->where("clave", sha1($datos->clave))
		->get($this->_tabla)
		->row();

		if ($tmp === null) {
			return false;

		} else {
			$this->cargar($tmp->id);

			return true;
		}
	}

	public function rol()
	{
		return new Usuario_tipo_model($this->usuario_tipo_id);
	}

	public function empresa()
	{
		return new Empresa_model($this->empresa_id);
	}
}

/* End of file Usuario_model.php */
/* Location: ./application/models/Usuario_model.php */ ?>