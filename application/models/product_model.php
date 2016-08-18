<?php
class Product_model extends CI_Model {

		public $id_producto;
		public $nombre;
		public $precio;
		public $stock;

        public function __construct()
        {
                parent::__construct();
        }

		public function get_product_by_id($id) {
  			if($id != FALSE) {
    			$query = $this->db->get_where('product', array('id' => $id));
    			return $query->row_array();
  			} else {
    			return FALSE;
  			}
		}

		public function get_product_names() {
			$query = $this->db->query('SELECT nombre FROM producto');
			return $query->result_array();
		}

		public function get_field_of_table($field, $id, $table){
			if($id =! 0){
				$query = $this->db->query('SELECT '.$field.'FROM '.$table.' WHERE id='.$id.'');
				return $query->row_array();
			}
		}

		public function get_stock_by_product($id){
			if($id != FALSE){
				$query = $this->db->query('SELECT stock FROM producto WHERE id='.$id.'');
				return $query->row_array();
			}
		}

		public function get_all_products(){
			$query = $this->db->query('SELECT * FROM producto ORDER BY nombre');
			return $query->result_array();
		}

		public function create_product($product){
			$this->load->helper('url');

			//$data['id_producto'] = null;
			
    		$data['nombre'] = $product['nombre'];
			$data['precio'] = $product['precio'];
			$data['stock'] = $product['stock'];

    		return $this->db->insert('producto', $data);
		}
	
		public function get_facturas($id){
			$this->db->select('id_factura, cantidad, subtotal');
			$this->db->from('factura_detalle');
			$this->db->where('id_producto', $id);
			$query = $this->db->get();
			return $query->result_array();
		}
		
		
}
