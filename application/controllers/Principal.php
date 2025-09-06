<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->ses = $this->session->userdata("user");

		$this->load->model([
			"Ley_model",
			"Solicitud_model"
		]);
	}

	public function index()
	{
		$vista = "";
		$filto = [];

		$datos = [
			"menu" => "menu",
			"user" => $this->ses,
			"emp" => new Empresa_model($this->ses["empresa_id"]),
			"scripts" => ["assets/js/admin.js"]
		];

		if ($this->ses["rol"] == 3) {
			$vista = "inicio/lector";
			$filto["empresa_id"] = $this->ses["empresa_id"];

		} else if ($this->ses["rol"] == 2) {
			$vista = "inicio/auditor";

		} else {
			$vista = "inicio/admin";
			$datos["leyes"] = $this->Ley_model->buscar();
			$datos["empresas"] = $this->Empresa_model->buscar();
		}

		$datos["solicitudes"] = $this->Solicitud_model->_buscar($filto);
		$datos["vista"] = $vista;

		$this->load->view("principal", $datos);
	}

}

/* End of file Principal.php */
/* Location: ./application/controllers/Principal.php */
?>