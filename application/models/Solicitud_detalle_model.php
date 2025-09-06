<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud_detalle_model extends Centro_model {

	public $solicitud_id;
	public $ley_detalle_id;
	public $estado_id;
	public $responsable = null;
	public $evidencia = null;
	public $observacion = null;

	public function __construct($id="")
	{
		parent::__construct();
		
		if (!empty($id)) {
			$this->cargar($id);
		}
	}

}

/* End of file Solicitud_detalle_model.php */
/* Location: ./application/models/Solicitud_detalle_model.php */ ?>