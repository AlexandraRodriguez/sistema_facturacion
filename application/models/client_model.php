<?php 
class Client_model extends CI_Model {
	
	public $nit_cliente;
	public $nombre_cliente;
	public $direccion;
	public $telefono;
	
	 public function __construct()
        {
                parent::__construct();
        }
	
	public function create_client($client){
			$this->load->helper('url');

			$data['nit_cliente'] = $client['nit_cliente'];
    		$data['nombre_cliente'] = $client['nombre_cliente'];
			$data['direccion'] = $client['direccion'];
			$data['telefono'] = $client['telefono'];
			
    		return $this->db->insert('cliente', $data);
		}
}