  <?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class VentaController extends CI_Controller{
  public function index(){
    $this->load->view('ventaView');
  }
}
