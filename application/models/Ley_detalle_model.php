<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ley_detalle_model extends Centro_model {

	public $titulo;
	public $descripcion;
	public $ponderacion = 0;
	public $ley_id;
	public $parent = null;
	public $inciso = 0;
	public $marco_legal = null;
	
	public function __construct($id="")
	{
		parent::__construct();
		
		if (!empty($id)) {
			$this->cargar($id);
		}
	}
}

/* End of file Ley_detalle_model.php */
/* Location: ./application/models/Ley_detalle_model.php */ ?>