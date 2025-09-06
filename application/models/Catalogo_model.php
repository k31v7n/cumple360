<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogo_model extends CI_Model {

	public function verMadurez($args=[])
	{
		if (elemento($args, "id")) {
			$this->db->where("id", $args["id"]);
		}

		if (elemento($args, "rango")) {
			$rango = $args["rango"];

			$this->db
			->where("{$rango} between inicio and fin", null, false);
		}

		$tmp = $this->db
		->get("madurez");

		if (isset($args["_uno"])) {
			return $tmp->row();
		}

		return $tmp->result();
	}

	public function verEstados($args=[])
	{
		if (elemento($args, "id")) {
			$this->db->where("id", $args["id"]);
		}

		$tmp = $this->db
		->get("estado");

		if (isset($args["_uno"])) {
			return $tmp->row();
		}

		return $tmp->result();
	}

}

/* End of file Catalogo_model.php */
/* Location: ./application/models/Catalogo_model.php */ ?>