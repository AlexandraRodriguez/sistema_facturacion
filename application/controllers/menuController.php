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
}
