<?php
class Clients extends CI_Controller {
	
	 public function new_client() {
	 	$this->load->view('header.php');
    	$this->load->view('navbar.php');
    	$this->load->view('clients/newClient.php');
	 }
	 
	 public function create(){
	 	$this->load->model('client_model');
	 	
		$client['nit_cliente'] = $this->input->post("nit_cliente");
		$client['nombre_cliente'] = $this->input->post("nombre_cliente");
		$client['direccion'] = $this->input->post("direccion");
		$client['telefono'] = $this->input->post("telefono");
		
		$this->client_model->create_client($client);
		 
		$this->load->view('header.php');
    	$this->load->view('navbar.php');
    	$this->load->view('clients/clientCreated');
	 	
	 }
	 
}
