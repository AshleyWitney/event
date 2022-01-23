<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrateur_accueil extends CI_Controller {


 public function __construct()
 {
 parent::__construct();
 $this->load->model('db_model');
 $this->load->helper('url_helper');
 }

 public function afficher()
 {
    /*
 $data['titre'] = 'Liste des pseudos :';
 $data['pseudos'] = $this->db_model->get_all_compte();
 */
 $data['newsO'] = $this->db_model->get_news_org();

 $this->load->view('menu_administrateur');
 $this->load->view('accueil_administrateur');
 $this->load->view('templates/bas');
 }
}