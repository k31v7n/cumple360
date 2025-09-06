<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->ses = $this->session->userdata("user");

		$this->load->model([
			"Solicitud_detalle_model",
			"Solicitud_model",
			"Ley_model"
		]);	
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

	public function ver($id)
	{
		$sol = new Solicitud_model($id);

		$this->load->view("principal", [
			"menu" => "menu",
			"vista" => "solicitud/cuerpo",
			"emp" => $sol->empresa(),
			"sol" => $this->Solicitud_model->_buscar([
				"id" => $id,
				"_uno" => true
			]),
			"regresar" => base_url("empresa/solicitudes/{$sol->empresa_id}"),
			"scripts" => ["assets/js/auditor.js"]
		]);
	}

	public function datos($id)
	{
		$datos = [
			"madurez" => $this->catalogo->verMadurez(),
			"estados" => $this->catalogo->verEstados()
		];

		$sol = new Solicitud_model($id);

		$datos["madurez"] = $this->catalogo->verMadurez([
			"id" => $sol->madurez_id,
			"_uno" => true
		]);

		$tmpLey = $this->Ley_model->buscar([
			"id" => $sol->ley_id,
			"_uno" => true
		]);

		$ley = $tmpLey;
		$ley->capitulos = [];
		$capitulos = $sol->getDetalle([
			"padre" => true
		]);

		if ($capitulos) {
			foreach ($capitulos as $cap) {

				$articulos = $sol->getDetalle([
					"parent" => $cap->id
				]);

				$xcap = $cap;
				$xcap->articulos = $articulos;
				$ley->capitulos[] = $xcap;
			}
		}

		$datos["ley"] = $ley;

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($datos));
	}

	public function actualizar()
	{
		if ($this->input->method() === "post") {

			$data = ["exito" => 0];
			$datos = json_decode(file_get_contents("php://input"));

			$dsol = new Solicitud_detalle_model($datos->detalle->id);
			$sol = new Solicitud_model($datos->detalle->solicitud_id);

			if ($dsol->guardar($datos->detalle)) {
				$data["exito"] = 1;
				$data["reg"] = $sol->getDetalle([
					"id" => $dsol->getPK(),
					"_uno" => true
				]);
			}

			if (empty($sol->iniciado)) {
				$sol->evaluador_id = $this->ses["id"];
				$sol->iniciado = 1;
			}

			$sol->cumple = $datos->avance;

			$madurez = $this->catalogo->verMadurez([
				"rango" => $datos->avance,
				"_uno" => true
			]);

			if ($madurez) {
				$sol->madurez_id = $madurez->id;
			}

			$sol->guardar();

			$data["madurez"] = $madurez;

			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
		}
	}

	public function constancia($id)
	{
		$sol = new Solicitud_model($id);

		$this->load->view("solicitud/impresion", [
			"sol" => $sol
		]);
	}
}

/* End of file Solicitud.php */
/* Location: ./application/controllers/Solicitud.php */ ?>