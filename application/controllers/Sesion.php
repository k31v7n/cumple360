<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {

	public function index()
	{
		$this->load->view("principal", [
			"vista" => "login",
			"scripts" => ["assets/js/login.js"]
		]);	
	}
}

/* End of file Sesion.php */
/* Location: ./application/controllers/Sesion.php */
?>