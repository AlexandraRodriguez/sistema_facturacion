<?php

class Menu_Model extends CI_Model {

        public $firstname;
        public $lastname;
        public $grants_id;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        public function insert_invoice($data){
          //Validar
          $temp['invoice_date']=$data['invoice_date'];
          $temp['client_id']=$data['client_id'];
          //$temp['razon_social']=$data['razon_social'];
          //$temp['nit_ci']=$data['nit_ci'];
          $temp['user_id']=$data['user_id'];
          $temp['total_amount']=$data['total_amount'];
          $temp['warehouse_id']=$data['warehouse_id'];
        
          
          $query_result= $this->db->insert('invoice', $temp);
          //$invoice_id=$this->db->query();
          var_dump($query_result);
          //$this->insert_invoice_lines($data['lines'],$invoice_id);


        }
        public function insert_invoice_lines($data){
            //Aca insertaremos las lineas
            echo 'console.log("Llegue aca")';
        }
}
?>
