<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invite_accueil extends CI_Controller {


 public function __construct()
 {
 parent::__construct();
 $this->load->model('db_model');
 $this->load->helper('url_helper');
 }

 public function lister()
 {
 $data['newsI'] = $this->db_model->get_news_inv();
 $this->load->view('menu_invite');
 $this->load->view('accueil_invite');
 $this->load->view('templates/bas');
 }
}