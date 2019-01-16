<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrarTransaccion extends CI_Controller {

	public function index()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('banco', 'Username', 'required');
		
		$this->load->model('Cuentasmodel');
		$this->load->model('Bancomodel');
		$data['bancos'] = $this->Bancomodel->obtener_bancos();
		$data['tipocuentas'] = $this->Cuentasmodel->obtener_tipos_cuenta();
		$this->load->view('vista_transaccion',$data);
	}

	public function registrar_transaccion()
	{
		foreach($_POST as $key => $value){
     		$data[$key] = $this->input->post($key);
		}

		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->load->model('Cuentasmodel');
		$this->load->model('Bancomodel');

		$datos['bancos'] = $this->Bancomodel->obtener_bancos();
		$datos['tipocuentas'] = $this->Cuentasmodel->obtener_tipos_cuenta();

		$this->form_validation->set_rules('banco', 'Banco', 'required');
		$this->form_validation->set_rules('numero_cuenta', 'Numero de Cuenta', 'required|min_length[20]|max_length[20]');
		$this->form_validation->set_rules('tipo_cuenta', 'Tipo de Cuenta', 'required');
		$this->form_validation->set_rules('numero_documento', 'Cedula de Identidad', 'required|max_length[10]');
		$this->form_validation->set_rules('nombre_titular_cuenta', 'Nombre del Titular', 'required');
		$this->form_validation->set_rules('cantidad_pesos', 'Pesos', 'required');
		$this->form_validation->set_rules('comentario', 'Comentario', 'max_length[100]');
		
		if ($this->form_validation->run() == FALSE)	{
			$this->load->model('Transaccionmodel');
			$this->Transaccionmodel->insertar_transaccion($data);
			$this->load->view('vista_transaccion',$datos);
		}
		else {
			$this->load->view('vista_transaccion',$datos);
		}
	}
}