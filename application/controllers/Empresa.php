<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

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
			$data  = ["exito" => 0];

			$emp = new Empresa_model($id);
				
			if (isset($_FILES["logo"]) && $_FILES["logo"]["name"]) {
				$extension = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
				$nombre = time().".{$extension}";

				move_uploaded_file($_FILES["logo"]["tmp_name"], FCPATH."assets/img/{$nombre}");

				$_POST["logo"] = $nombre;
			}

			if ($emp->guardar($_POST)) {

				$data["mensaje"] = "Guardado correctamente.";
				$data["exito"] = 1;
				$data["reg"] = $emp->buscar(["id" => $emp->getPK(), "_uno" => true]);

			} else {
				$data["mensaje"] = $emp->getMensaje();
			}

			$this->output
			->set_output(json_encode($data));
		}
	}

	public function buscar()
	{
		$lista = $this->Empresa_model->buscar();

		$this->output
		->set_output(json_encode($lista));
	}
}

/* End of file Empresa.php */
/* Location: ./application/controllers/Empresa.php */ ?>