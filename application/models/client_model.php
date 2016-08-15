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
	
	public function get_all_clients(){
			$query = $this->db->query('SELECT * FROM cliente');
			return $query->result_array();
	}
	 
	public function get_facturas($id){
			$this->db->select('id_factura, fecha, total');
			$this->db->from('factura');
			$this->db->where('id_cliente', $id);
			$query = $this->db->get();
			return $query->result_array();
		}
}