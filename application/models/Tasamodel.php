<?php

class Tasamodel extends CI_Model {

    public function __construct()   {
      $this->load->database(); 
    }

	public function obtener_tasa($tipo_transaccion)
    {
        $query = $this->db->select("*");
        $query = $this->db->limit(1);
        $query = $this->db->from('tasas');
        $query = $this->db->where('tipo_transacc',$tipo_transaccion);
        $query = $this->db->order_by("created_at", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function listado_tasas()
    {
        $query = $this->db->select("*");
        $query = $this->db->from('tasas');
        $query = $this->db->order_by("created_at", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function registrar_tasa($data)
    {   
        $query = $this->db->insert("tasas", $data);
        return $query;
    }

    public function actualizar_tasa($data,$id_tasa)
    {
        $this->db->set($data);
        $this->db->where('id',$id_tasa);
        $this->db->update('tasas', $data);    
    }

    public function borrar_tasa($id_tasa)
    {   
        $this->db->where('id', $id_tasa);
        $this->db->delete('tasas');
    }   
}

?>