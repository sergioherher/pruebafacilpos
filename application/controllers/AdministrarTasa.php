<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministrarTasa extends CI_Controller {

	public function index()
	{
		$this->load->model('Tasamodel');
		$data['tasas'] = $this->Tasamodel->listado_tasas();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->view('admin_tasa',$data);
	}

	public function consultar_tasa()
	{
			$tipo_transacc = $_GET['tipo_transacc'];
			$this->load->model('Tasamodel');
			$data = $this->Tasamodel->obtener_tasa($tipo_transacc);
			echo json_encode($data->result());
	}

	public function agregar_tasa() {
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('Tasamodel');

		$this->form_validation->set_rules('tasa', 'Tasa', 'required');

		if ($this->form_validation->run() == FALSE)	{
			$data['tasas'] = $this->Tasamodel->listado_tasas();			
			$this->load->view('admin_tasa',$data);
		}
		else {
			$desc_tasa = $_POST['tasa'];
			$tipo_transacc = $_POST['tipo_transacc'];
			$tasa = ["tasa"=>$desc_tasa,"tipo_transacc"=>$tipo_transacc];
			$data['mensaje'] = $this->Tasamodel->registrar_tasa($tasa);
			$data['tasas'] = $this->Tasamodel->listado_tasas();			
			$this->load->view('admin_tasa',$data);
		}
	}

	public function editar_tasa($id_tasa) {
		$tasa = $_GET['tasa'];
		$tipo_transacc = $_GET['tipo_transacc'];
		$data = ['tasa' => $tasa,'tipo_transacc' => $tipo_transacc];
		$this->load->model('Tasamodel');
		$this->Tasamodel->actualizar_tasa($data,$id_tasa);
		$data = ['tipo_transacc'=>$tipo_transacc,'tasa' => $tasa,'id_tasa' => $id_tasa];
		echo json_encode($data);
	}

	public function borrar_tasa($id_tasa) {
		$this->load->model('Tasamodel');
		$this->Tasamodel->borrar_tasa($id_tasa);
		$data = ['id_tasa' => $id_tasa];
		echo json_encode($data);
	}
}