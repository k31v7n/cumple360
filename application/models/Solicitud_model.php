<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud_model extends Centro_model {

	public $encargado;
	public $ley_id;
	public $fecha;
	public $fecha_entrega;
	public $cumple;
	public $madurez_id;
	public $usuario_id;
	public $empresa_id;
	public $evaluador_id = null;
	public $iniciado = 0;

	public function __construct($id="")
	{
		parent::__construct();
		
		if (!empty($id)) {
			$this->cargar($id);
		}
	}

	public function _buscar($args=[])
	{
		if (elemento($args, "empresa_id")) {
			$this->db->where("a.empresa_id", $args["empresa_id"]);
		}

		$tmp = $this->db
		->select("
			a.*, 
			b.nombre as nombre_ley,
			c.nombre as nombre_madurez,
			d.nombre as evaluador")
		->from("solicitud a")
		->join("ley b", "b.id = a.ley_id")
		->join("madurez c", "c.id = a.madurez_id")
		->join("usuario d", "d.id = a.evaluador_id", "left")
		->get();

		if (isset($args["_uno"])) {
			return $tmp->row();
		}

		return $tmp->result();
	}
}

/* End of file Solicitud_model.php */
/* Location: ./application/models/Solicitud_model.php */ ?>