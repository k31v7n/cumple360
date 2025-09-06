<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ley extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			"Ley_model",
			"Ley_detalle_model"
		]);	

		$this->output
		->set_content_type('application/json');
	}

	public function index()
	{
		die("Forbidden");
	}

	public function guardar($id="")
	{
		if ($this->input->method() === "post") {
			$datos = json_decode(file_get_contents("php://input"));
			$data  = ["exito" => 0];

			$ley = new Ley_model($id);

			if ($ley->guardar($datos)) {

				$data["mensaje"] = "Guardado correctamente.";
				$data["exito"] = 1;
				$data["reg"] = $ley->_buscar(["id" => $ley->getPK()])[0];

			} else {
				$data["mensaje"] = $ley->getMensaje();
			}

			$this->output
			->set_output(json_encode($data));
		}
	}

	public function guardar_detalle($id="")
	{
		if ($this->input->method() === "post") {
			$datos = json_decode(file_get_contents("php://input"));
			$data  = ["exito" => 0];

			$leyd = new Ley_detalle_model($id);
			
			if ($leyd->guardar($datos)) {

				$data["mensaje"] = "Guardado correctamente.";
				$data["exito"] = 1;
				$data["reg"] = $this->Ley_model->_buscar(["id" => $leyd->ley_id])[0];

			} else {
				$data["mensaje"] = $leyd->getMensaje();
			}

			$this->output
			->set_output(json_encode($data));
		}
	}

	public function buscar()
	{
		$lista = $this->Ley_model->_buscar();

		$this->output
		->set_output(json_encode($lista));
	}
}

/* End of file Ley.php */
/* Location: ./application/controllers/Ley.php */ ?>