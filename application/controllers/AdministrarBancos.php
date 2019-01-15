<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministrarBancos extends CI_Controller {

	public function index()
	{
		$this->load->model('Bancomodel');
		$data['bancos'] = $this->Bancomodel->obtener_bancos();
		$this->load->view('admin_bancos',$data);
	}

	public function agregar_banco($data) {
		$this->load->model('Bancomodel');
		
		$data["mensaje"] = $this->Bancomodel->insertar_banco();
	}
}