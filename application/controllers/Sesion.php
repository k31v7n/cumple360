<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model([
			"Usuario_tipo_model",
			"Empresa_model"
		]);	
	}

	public function index()
	{
		if ($this->session->has_userdata("user")) {
			redirect(base_url());

		} else {

			$this->load->view("principal", [
				"vista" => "login",
				"scripts" => ["assets/js/login.js"]
			]);	
		}
	}

	public function login()
	{
		if ($this->input->method() === "post") {
			$datos = json_decode(file_get_contents("php://input"));
			$data  = ["exito" => 0];

			if (verPropiedad($datos, "alias") && 
				verPropiedad($datos, "clave")) {

				$user = new Usuario_model();

				if ($user->login($datos)) {

					$data["exito"] = 1;
					$data["mensaje"] = "Bienvenido.";
					
					$rol = $user->rol();
					$emp = $user->empresa();

					$ruta = base_url("assets/img/");

					$this->session->set_userdata("user", [
						"id" => $user->getPK(),
						"nombre" => $user->nombre,
						"empresa_id" => $emp ? $emp->getPK() : null,
						"empresa_logo" => $emp ? $ruta . $emp->logo : null,
						"empresa_nombre" => $emp ? $emp->nombre : null,
						"rol" => $rol->getPK(),
						"rol_nombre" => $rol->nombre
					]);

				} else {
					$data["mensaje"] = "Usuario y contraseña incorrecto.";
				}

			} else {
				$data["mensaje"] = "Usuario y contraseña requerido.";
			}

			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));

		} else {
			$this->output->set_status_header(403);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("sesion");
	}
}

/* End of file Sesion.php */
/* Location: ./application/controllers/Sesion.php */
?>