<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_model extends Centro_model {

	public $nombre;
	public $direccion;
	public $logo;
	public $representante;
	public $usuario_id;
	public $identificacion;

	public function __construct($id="")
	{
		parent::__construct();
		
		if (!empty($id)) {
			$this->cargar($id);
		}
	}
}

/* End of file Empresa_model.php */
/* Location: ./application/models/Empresa_model.php */ ?>