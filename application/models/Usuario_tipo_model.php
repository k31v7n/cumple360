<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_tipo_model extends Centro_model {

	public $nombre;
	
	public function __construct($id="")
	{
		parent::__construct();
		
		if (!empty($id)) {
			$this->cargar($id);
		}
	}
}

/* End of file Usuario_tipo_model.php */
/* Location: ./application/models/Usuario_tipo_model.php */ ?>