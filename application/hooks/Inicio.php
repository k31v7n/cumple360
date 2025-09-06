<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio
{
	protected $ci;
	protected $permitidas = [];

	public function __construct()
	{
        $this->ci =& get_instance();

        $this->permitidas = [
        	"sesion"
        ];
	}

	public function validarSesion()
	{
		if ($this->ci->session->has_userdata("user")) {
			return true;

		} else {
			$tmp = explode("/", $_SERVER["REQUEST_URI"]);

			if (isset($tmp[2]) && in_array($tmp[2], $this->permitidas)) {
				return true;
				
			} else {
				redirect("sesion");
			}
		}
	}
}

/* End of file Inicio.php */
/* Location: ./application/hooks/Inicio.php */
