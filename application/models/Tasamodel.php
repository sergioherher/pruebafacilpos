<?php

class Tasamodel extends CI_Model {

    public function __construct()   {
      $this->load->database(); 
    }

	public function obtener_tasa()
    {
        $query = $this->db->select("*");
        $query = $this->db->limit(1);
        $query = $this->db->from('tasas');
        $query = $this->db->order_by("created_at", "desc");
        $query = $this->db->get();
        return $query;
    }
}

?>