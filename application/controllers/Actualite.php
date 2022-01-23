<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Actualite extends CI_Controller {

 public function __construct()
 {
 parent::__construct();
 $this->load->model('db_model');
 $this->load->helper('url_helper');
 }
//Affiche une seule actualite avec son numero id
  public function afficher($numero =FALSE)
 {
 if ($numero==FALSE)
 { $url=base_url(); header("Location:$url");}
 else{
 $data['titre'] = 'Actualité :';
 $data['actu'] = $this->db_model->get_actualite($numero);

 $this->load->view('templates/haut');
 $this->load->view('actualite_afficher',$data);
 $this->load->view('templates/bas');
 }
 }
//affiche toute les actualités
 /*
public function touteact()
 {


 $data['actu'] = $this->db_model->get_all_actualite();

 $this->load->view('templates/haut');
 $this->load->view('page_accueil',$data);
 $this->load->view('templates/bas');
 }

*/



}
?>