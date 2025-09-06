<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->ses = $this->session->userdata("user");
	}

	public function index()
	{
		$vista = "";

		if ($this->ses["rol"] == 3) {
			$vista = "inicio/lector";
		}

		$this->load->view("principal", [
			"menu" => "menu",
			"vista" => $vista,
			"user" => $this->ses,
			"emp" => new Empresa_model($this->ses["empresa_id"])
		]);
	}

}

/* End of file Principal.php */
/* Location: ./application/controllers/Principal.php */
?>