<?php 
class Compania_model extends CI_Model {
	
	public $id_compania;
	public $nombre_compania;
	public $direccion;
	public $telefono;
	public $nit;
	
	 public function __construct()
        {
                parent::__construct();
        }
	
	public function create_compania($compania){
			$this->load->helper('url');

			$data['id_compania'] = null;
			$data['nombre_compania'] = $compania['nombre_compania'];
    		$data['direccion'] = $compania['direccion'];
			$data['telefono'] = $compania['telefono'];
			$data['nit'] = $compania['nit'];
			
    		return $this->db->insert('compania', $data);
		}
}