<?php
class Products extends CI_Controller {


	 public function show($id) {
	 	
		$this->load->model('product_model');
    	
    	$products = $this->product_model->get_product_by_id($id);
    	$data['nombre'] = $products['nombre'];
    	$data['precio'] = $products['precio'];
    	$data['stock'] = $products['stock'];
       	
	 	
     }
	 
	 public function names(){
	 	$this->load->model('product_model');
    	
		$data['products'] = $this->product_model->get_product_names();
		
	 }
	 
	 public function stock($id){
	 	$this->load->model('product_model');
    	
		$data['stock'] = $this->product_model->get_stock_by_product($id);
		
	 }
	 
	 public function new_product() {
	 	$this->load->view('header.php');
    	$this->load->view('navbar.php');
    	$this->load->view('newProduct.php');
	 }
	 
	 public function create(){
	 	$this->load->model('product_model');
	 	
	 	$data['result'] = "Product created!";
		
		$product['nombre'] = $this->input->post("nombre");
		$product['precio'] = $this->input->post("precio");
		$product['stock'] = $this->input->post("stock");
		
		$this->product_model->create_product($product);
		 
		$this->load->view('header.php');
    	$this->load->view('navbar.php');
    	$this->load->view('productCreated', $data);
	 	
	 }
}