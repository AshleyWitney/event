<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accueil extends CI_Controller {


     public function __construct()
 {
 parent::__construct();
 $this->load->helper('url');
  $this->load->model('db_model');
 $this->load->helper('url_helper');
 }
 public function afficher()
 {
      $data['actu'] = $this->db_model->get_all_actualite();
      $data['lieuser'] = $this->db_model->get_all_lieux_service();

// $data['parametre'] = ($donnee);
 //Chargement de la view haut.php
 $this->load->view('menu_visiteur');
 //Chargement de la view du milieu : page_accueil.php
 //$this->load->view('page_accueil');
  $this->load->view('page_accueil',$data);
 //Chargement de la view bas.php
 $this->load->view('templates/bas');
 }


public function lieu_service()
 {
  
      $data['lieuser'] = $this->db_model->get_all_lieux_service();

// $data['parametre'] = ($donnee);
 //Chargement de la view haut.php
 $this->load->view('menu_visiteur');
 //Chargement de la view du milieu : page_accueil.php
 //$this->load->view('page_accueil');
  $this->load->view('lieux_visiteurs',$data);
 //Chargement de la view bas.php
 $this->load->view('templates/bas');
 }






}
?>

