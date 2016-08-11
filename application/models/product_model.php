<?php 
class Product_model extends CI_Model {

		public $id_producto;
		public $nombre;
		public $precio;
		public $id_tipo;
		public $stock;

        public function __construct()
        {
                parent::__construct();
        }

		public function get_product_by_id($id) {
  			if($id != FALSE) {
    			$query = $this->db->get_where('producto', array('id_producto' => $id));
    			return $query->row_array();
  			} else {
    			return FALSE;
  			}
		}
		
		public function get_product_names() {	
			$query = $this->db->query('SELECT nombre FROM producto');
			return $query->result_array();
		}
		
		public function get_stock_by_product($id){
			if($id != FALSE){
				$query = $this->db->query('SELECT stock FROM producto');
				return $query->row_array();
			}
		}
		
		public function get_all_products(){
			$query = $this->db->query('SELECT * FROM producto');
			return $query->result_array();
		}
		
		public function create_product($product){
			$this->load->helper('url');

			$data['id_producto'] = null;
    		$data['nombre'] = $product['nombre'];
			$data['precio'] = $product['precio'];
			$data['id_tipo'] = $product['id_tipo'];
			$data['stock'] = $product['stock'];
			
    		return $this->db->insert('producto', $data);
		}
		
		
}