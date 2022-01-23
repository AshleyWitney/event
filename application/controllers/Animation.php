<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Animation extends CI_Controller {

 public function __construct()
 {
 parent::__construct();
 $this->load->model('db_model');
 $this->load->helper('url_helper');
 }

//affiche toute les programmations
public function touteani()
 {


 $data['anim'] = $this->db_model->get_all_animation();
 $data['ladate'] = $this->db_model->get_ladate();
 $data['prog'] = $this->db_model->get_all_programmation();

 $this->load->view('menu_visiteur');
 $this->load->view('programmation_afficher',$data);
 $this->load->view('templates/bas');
 }

//Detail d'une animation
public function touteanidetail($numero =FALSE)
 {

if ($numero==FALSE)
 { $url=base_url(); header("Location:$url");}
 else{
 $data['titre'] = 'Animation :';

 $data['danim'] = $this->db_model->get_detail_anim($numero);

 $this->load->view('menu_visiteur');
 $this->load->view('detail_animation',$data);
 $this->load->view('templates/bas');
 }

 }
 
//Detail d'un invité
public function touteinvdetail($numero =FALSE)
 {

if ($numero==FALSE)
 { $url=base_url(); header("Location:$url");}
 else{
 $data['titre'] = 'Invité :';
 $data['poste'] = $this->db_model->get_all_invite_poste7($numero);
 $data['url'] = $this->db_model->get_all_url7($numero);
 $data['guest'] = $this->db_model->get_all_guest7($numero);
 $data['dinv'] = $this->db_model->get_detail_inv($numero);


 $this->load->view('menu_visiteur');
 $this->load->view('detail_invite',$data);
 $this->load->view('templates/bas');
 }

 }
 
//Detail lieu
public function lieudetail($numero =FALSE)
 {

if ($numero==FALSE)
 { $url=base_url(); header("Location:$url");}
 else{
 $data['titre'] = 'Lieu :';
$data['lieuser'] = $this->db_model->get_all_lieux_service7($numero);
 $data['danim'] = $this->db_model->get_detail_lieu($numero);

 $this->load->view('menu_visiteur');
 $this->load->view('detail_lieu',$data);
 $this->load->view('templates/bas');
 }

 }




}
?>


