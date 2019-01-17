<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaccion extends CI_Controller {

	public function index()
	{
		
		$this->load->library('form_validation');
		$this->load->helper('form');

		$fecha_hora_actual = date("Y-m-d H:i:s", strtotime("now"));
		$fecha_hora_inicial = date("Y-m-d H:i:s", strtotime('-30 day'));

		$this->load->model('Transaccionmodel');
		$data['transacciones'] = $this->Transaccionmodel->obtener_transacciones_entre_fechas($fecha_hora_inicial,$fecha_hora_actual);
		$this->load->view('vista_lista_transacciones',$data);
	}

	public function entre_fechas()
	{
		$fecha_hora_actual = $_POST['fecha_fin'];
		$fecha_hora_inicial = $_POST['fecha_ini'];

		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('bancoID', 'Username', 'required');
		$this->load->model('Transaccionmodel');
		$data['transacciones'] = $this->Transaccionmodel->obtener_transacciones_entre_fechas($fecha_hora_inicial,$fecha_hora_actual);
		$this->load->view('vista_lista_transacciones',$data);
	}
}