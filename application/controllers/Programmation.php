<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Programmation extends CI_Controller {

 public function __construct()
 {
 parent::__construct();
 $this->load->model('db_model');
 $this->load->helper('url_helper');
 }

//affiche toute les programmations

}
?>