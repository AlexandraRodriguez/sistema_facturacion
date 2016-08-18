<?php
class Clients extends CI_Controller {
	
	 public function new_client() {
	 	$this->load->view('header.php');
    	$this->load->view('navbar.php');
    	$this->load->view('clients/newClient.php');
	 }
	 
	 public function create(){
	 	$this->load->model('client_model');
	 	
		$client['id_cliente'] = null;
		$client['nombre'] = $this->input->post("nombre");
		$client['apellido'] = $this->input->post("apellido");
		$client['razon_social'] = $this->input->post("razon_social");
		$client['nit_ci'] = $this->input->post("nit_ci");
		
		$this->client_model->create_client($client);
		 
		$this->load->view('header.php');
    	$this->load->view('navbar.php');
    	$this->load->view('clients/clientCreated');
	 	
	 }
	 
	 public function get_facturas_por_cliente(){
		$this->load->model('client_model');
		$clients = $this->client_model->get_all_clients();
		$data['clients'] = $clients;
		$array = array();
	
		foreach ($clients as $key => $value) {
			$id = $value['id_cliente'];
			$array[$id] = $this->client_model->get_facturas($id);
		}
		
		$data['facturas'] = $array;
	
		$this->load->view('header.php');
    	$this->load->view('navbar.php');
    	$this->load->view('clients/facturasPorCliente', $data);
	}
	 
}
