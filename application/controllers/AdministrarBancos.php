<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministrarBancos extends CI_Controller {

	public function index()
	{
		$this->load->model('Bancomodel');
		$data['bancos'] = $this->Bancomodel->obtener_bancos();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->view('admin_bancos',$data);
	}

	public function agregar_banco() {
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('Bancomodel');

		$this->form_validation->set_rules('desc_banco', 'Descripcion del Banco', 'required');

		if ($this->form_validation->run() == FALSE)	{
			$data['mensaje'] = "Debe ingresar el nombre del banco";
			$data['bancos'] = $this->Bancomodel->obtener_bancos();			
			$this->load->view('admin_bancos',$data);
		}
		else {
			$desc_banco = $_POST['desc_banco'];
			$data['prueba'] = $desc_banco;
			$data['mensaje'] = $this->Bancomodel->insertar_banco($desc_banco);
			$data['bancos'] = $this->Bancomodel->obtener_bancos();			
			$this->load->view('admin_bancos',$data);
		}
	}

	public function editar_banco($id_banco) {
		$desc_banco = $_GET['desc_banco'];
		$data = ['desc_banco' => $desc_banco];
		$this->load->model('Bancomodel');
		$this->Bancomodel->actualizar_banco($data,$id_banco);
		$data = ['desc_banco' => $desc_banco,'id_banco' => $id_banco];
		echo json_encode($data);
	}

	public function borrar_banco($id_banco) {
		$this->load->model('Bancomodel');
		$this->Bancomodel->borrar_banco($id_banco);
		$data = ['id_banco' => $id_banco];
		echo json_encode($data);
	}
}