<?php 
class Factura_model extends CI_Model {

		public $id_factura;
		public $nit_cliente;
		public $fecha;
		public $monto_total;

        public function __construct()
        {
                parent::__construct();
        }

}