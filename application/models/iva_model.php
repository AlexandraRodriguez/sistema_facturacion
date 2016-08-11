<?php 
class Iva_model extends CI_Model {

    //public $ivar = 13;
    /*public $monto;
    public $var1;
    public $var2;*/

    public function __construct(){
            parent::__construct();
    }

    public function get_iva($dato){//
        $ivar = 13;
        $monto = $dato;
        
        $var1 = $ivar/100;
        $var2 = $var1*$monto;
        $res = $var2+$monto;
    echo "El resultado con IVA es: " .$res;
    return $res;
    }        

}