<?php
class Companias extends CI_Controller {
	
	 public function new_compania() {
	 	$this->load->view('header.php');
    	$this->load->view('navbar.php');
    	$this->load->view('companias/newCompania.php');
	 }
	 
	 public function create(){
	 	$this->load->model('compania_model');
	 	
		$compania['id_compania'] = null;
		$compania['nombre_compania'] = $this->input->post("nombre_compania");
		$compania['direccion'] = $this->input->post("direccion");
		$compania['telefono'] = $this->input->post("telefono");
		$compania['nit'] = $this->input->post("nit");
		
		$this->compania_model->create_compania($compania);
		 
		$this->load->view('header.php');
    	$this->load->view('navbar.php');
    	$this->load->view('companias/companiaCreated');
	 	
	 }
	 
}