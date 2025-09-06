<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model("Solicitud_model");	
	}

	public function index()
	{
		die("Forbidden");
	}

	public function guardar($id="")
	{
		if ($this->input->method() === "post") {
			$data  = ["exito" => 0];

			$sol = new Solicitud_model($id);

			if (empty($id)) {
				$_POST["madurez_id"] = 1;
				$_POST["cumple"] = 0;
				$_POST["fecha"] = Hoy();
			}

			if ($sol->guardar($_POST)) {

				$data["mensaje"] = "Guardado correctamente.";
				$data["exito"] = 1;
				$data["reg"] = $sol->buscar(["id" => $sol->getPK(), "_uno" => true]);

			} else {
				$data["mensaje"] = $sol->getMensaje();
			}

			$this->output
			->set_output(json_encode($data));
		}
	}

	public function buscar()
	{

	}

	public function imprimir()
	{

	}

	public function constancia($id)
	{
		echo $id;
	}
}

/* End of file Solicitud.php */
/* Location: ./application/controllers/Solicitud.php */ ?>