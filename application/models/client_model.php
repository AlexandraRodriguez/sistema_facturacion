<?php 
class Client_model extends CI_Model {
	
	public $id_cliente;
	public $nombre;
	public $apellido;
	public $razon_social;
	public $nit_ci;
	
	 public function __construct()
        {
                parent::__construct();
        }
	
	public function create_client($client){
			$this->load->helper('url');

			$data['id_cliente'] = null;
			$data['nombre'] = $client['nombre'];
    		$data['apellido'] = $client['apellido'];
			$data['razon_social'] = $client['razon_social'];
			$data['nit_ci'] = $client['nit_ci'];
			
    		return $this->db->insert('cliente', $data);
		}
}