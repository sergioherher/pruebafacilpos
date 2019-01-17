<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministrarBancos extends CI_Controller {

	//Retorna el listado de bancos para la vista de administración de bancos
	public function index()
	{
		$this->load->model('Bancomodel');
		$data['bancos'] = $this->Bancomodel->obtener_bancos();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->view('admin_bancos',$data);
	}

	//Ingresa un banco en la base de datos
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

	//Edita la descripción de un banco en base a un id dado
	public function editar_banco($id_banco) {
		$desc_banco = $_GET['desc_banco'];
		$data = ['desc_banco' => $desc_banco];
		$this->load->model('Bancomodel');
		$this->Bancomodel->actualizar_banco($data,$id_banco);
		$data = ['desc_banco' => $desc_banco,'id_banco' => $id_banco];
		echo json_encode($data);
	}

	//Elimina un banco de la base de datos
	public function borrar_banco($id_banco) {
		$this->load->model('Bancomodel');
		$this->Bancomodel->borrar_banco($id_banco);
		$data = ['id_banco' => $id_banco];
		echo json_encode($data);
	}
}