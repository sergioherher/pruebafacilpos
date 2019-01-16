<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultarTasa extends CI_Controller {
	public function index()
	{
			$this->load->model('Tasamodel');
			$data = $this->Tasamodel->obtener_tasa();
			echo json_encode($data->result());
	}
}