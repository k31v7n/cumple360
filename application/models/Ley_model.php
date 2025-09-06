<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ley_model extends Centro_model {

	public $nombre;
	public $descripcion;

	public function __construct($id="")
	{
		parent::__construct();
		
		if (!empty($id)) {
			$this->cargar($id);
		}
	}

	public function _buscar($args=[])
	{
		$leyes = $this->Ley_model->buscar($args);
		$lista = [];

		foreach ($leyes as $key => $value) {
			
			$ley = $value;
			$ley->capitulos = [];

			$capitulos = $this->Ley_detalle_model->buscar([
				"ley_id" => $value->id,
				"parent is null" => null
			]);

			if ($capitulos) {
				foreach ($capitulos as $cap) {

					$articulos = $this->Ley_detalle_model->buscar([
						"ley_id" => $value->id,
						"parent" => $cap->id
					]);

					$xcap = $cap;
					$xcap->articulos = $articulos;

					$ley->capitulos[] = $xcap;
				}
			}

			$lista[] = $ley;
		}

		return $lista;
	}
}

/* End of file Ley_model.php */
/* Location: ./application/models/Ley_model.php */ ?>