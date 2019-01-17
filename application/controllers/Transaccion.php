<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaccion extends CI_Controller {

	public function index()
	{
		$fecha_hora_actual = date("Y-m-d H:i:s", strtotime("now"));
		$fecha_hora_inicial = date("Y-m-d H:i:s", strtotime('-30 day'));
		$this->load->model('Transaccionmodel');
		$data['transacciones'] = $this->Transaccionmodel->obtener_transacciones_entre_fechas($fecha_hora_inicial,$fecha_hora_actual);
		$this->load->view('transaccion',$data);
	}

	public function entre_fechas()
	{
		$fecha_hora_actual = $_GET['fecha_fin'];
		$fecha_hora_inicial = $_GET['fecha_ini'];
		$this->load->model('Transaccionmodel');
		$data['transacciones'] = $this->Transaccionmodel->obtener_transacciones_entre_fechas($fecha_hora_inicial,$fecha_hora_actual);
		$this->load->view('transaccion',$data);
	}
}