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

		if (elemento($args, "id")) {
			$this->db->where("a.id", $args["id"]);
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

	public function empresa()
	{
		return new Empresa_model($this->empresa_id);
	}

	public function ley()
	{
		return new Ley_model($this->ley_id);
	}

	public function getDetalle($args=[])
	{
		$xid = $this->getPK();

		if (elemento($args, "padre")) {
			$this->db->where("a.parent is null", null);
		}

		if (elemento($args, "parent")) {
			$this->db->where("a.parent", $args["parent"]);
		}

		if (elemento($args, "id")) {
			$this->db->where("b.id", $args["id"]);
		}

		$tmp = $this->db
		->select("a.*, 
			b.id as evaluacion_id, 
			b.estado_id,
			b.responsable,
			b.evidencia,
			b.observacion,
			c.nombre as nombre_estado,
			c.color as color_estado,
			c.ponderacion as ponderacion_estado,
			0 as avance")
		->from("ley_detalle a")
		->join("solicitud_detalle b", "b.ley_detalle_id = a.id and b.solicitud_id = {$xid}", "left")
		->join("estado c", "c.id = b.id", "left")
		->where("a.ley_id", $this->ley_id)
		->get();

		if (isset($args["_uno"])) {
			return $tmp->row();
		}

		return $tmp->result();
	}

	public function evaluador()
	{
		return new Usuario_model($this->evaluador_id);
	}
}

/* End of file Solicitud_model.php */
/* Location: ./application/models/Solicitud_model.php */ ?>