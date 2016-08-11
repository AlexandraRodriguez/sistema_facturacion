<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class MenuController extends CI_Controller{
  public function index(){
    $this->load->view('header.php');
    $this->load->view('navbar.php');
    $this->load->view('cuerpo.php');
    $this->load->view('footer.php');
    //$this->load->view('menuView');
  }


  public function factura(){
    $this->load->view('header.php');
    $this->load->view('navbar.php');
    $this->load->view('formulario.php');
    //$this->load->view('footer.php');
  }

  public function get_products(){
    $this->load->model('product_model');
    //$data = $this->product_model->get_all_products();
    //return $data;
    $data = $this->product_model->get_all_products();

    if($data!=null){
      $response['success']='true';
      $response['data']=$data;
      $response['message']='Obtuve datos';    
    }else{
      $response['success']='true';
      $response['data']='not';
      $response['message']='Data Dismiss';
    }

    //RETORNA AL LADO CLIENTE EL ARRAY CONVERTIDO EN UNA CADENA DE TEXTO
    echo json_encode($response);
  }

  public function save_invoice(){

  }
  /*public function index(){
    $this->load->view('header.php');
    $this->load->view('navbar.php');
    $data['header'] = $this->load->view('header.php');
    $data['navbar'] = $this->load->view('navbar.php');
    $data['cuerpo'] = $this->load->view('cuerpo.php');
    $data['footer'] = $this->load->view('footer.php');
    $this->load->view('cuerp.php', $data);
    $this->load->view('footer.php');
  }*/
  public function insert_invoice(){

    $this->load->model('Menu_Model');

    $data['invoice_date'] = $this->input->post('invoice_date');
    $data['client_id'] = $this->input->post('client_id');
    $data['razon_social'] = $this->input->post('razon_social');
    $data['nit_ci'] = $this->input->post('nit_ci');
    $data['user_id'] = $this->input->post('user_id');
    $data['total_amount'] = $this->input->post('total_amount');
    $data['warehouse_id'] = $this->input->post('warehouse_id');


    $data['lines']  = $this->input->post('lines');

    /*if($data['client_id']==0){
      $id=$this->insert_new_client();
      $data['cliente_id']=$id;
    }*/

    $query_result = $this->Menu_Model->insert_invoice($data);
    echo json_encode($query_result);
  }
  //public function prueba(){}
  public function impresionfactura(){

	$this->load->view('VistaImpresionFactura/impresion');
  }

}?>
