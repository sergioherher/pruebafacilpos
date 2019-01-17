<?php

class Bancomodel extends CI_Model {
	public $desc_banco;

    public function __construct()   {
      $this->load->database(); 
    }

	public function obtener_bancos()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('bancos');
        $query = $this->db->get();
        return $query;
    }

    public function insertar_banco($data)
    {
    	$datos = ['desc_banco'=>$data];
        $this->db->insert('bancos', $datos);
    }

    public function actualizar_banco($data,$id_banco)
    {
		$this->db->set($data);
		$this->db->where('id',$id_banco);
    	$this->db->update('bancos', $data);    
    }

    public function borrar_banco($id_banco)
    {	
		$this->db->where('id', $id_banco);
		$this->db->delete('bancos');
    }	

}

?>