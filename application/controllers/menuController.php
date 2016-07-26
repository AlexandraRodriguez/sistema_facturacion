<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class MenuController extends CI_Controller{
  public function index(){
    $this->load->view('menuView');
  }
}
