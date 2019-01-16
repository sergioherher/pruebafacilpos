<?php

class Cuentasmodel extends CI_Model {

    public function __construct()   {
      $this->load->database(); 
    }

	public function obtener_tipos_cuenta()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tiposcuenta');
        $query = $this->db->get();
        return $query;
    }
}

?>