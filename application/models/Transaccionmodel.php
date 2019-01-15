<?php

class Transaccionmodel extends CI_Model {
	public $banco;
	public $numero_cuenta;
	public $tipo_cuenta;
	public $numero_documento;
	public $tipo_documento;
	public $nombre_titular_cuenta;
	public $cantidad_pesos;
	public $tipo_transaccion;
	public $comentario;
	public $id_usuario;
	public $created_at;

    public function __construct()   {
      $this->load->database(); 
    }

	public function obtener_transacciones_entre_fechas($fecha_ini,$fecha_fin)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('transacciones');
        $query = $this->db->where('created_at >=', $fecha_ini);
        $query = $this->db->where('created_at <=', $fecha_fin);
        $query = $this->db->get();
        $query->horaactual = $fecha_ini;
        return $query;
    }

    public function insertar_transaccion($data)
    {
    	$this->db->insert('transacciones', $data);
    }

    public function actualizar_transaccion($data,$id_transaccion)
    {
		$this->db->set($data);
		$this->db->where('id',$id_transaccion);
    	$this->db->update('transacciones', $data);
    }

    public function borrar_transaccion($id_transaccion)
    {	
		$this->db->where('id', $id_transaccion);
		$this->db->delete('transacciones');
    }	

}

?>