<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invite_poste extends CI_Controller {

 public function __construct()
 {
 parent::__construct();
 $this->load->model('db_model');
 $this->load->helper('url_helper');
 }

//affiche toute les invites et les postes associes
public function touteinv()
 {


 $data['poste'] = $this->db_model->get_all_invite_poste();
 $data['url'] = $this->db_model->get_all_url();
 $data['guest'] = $this->db_model->get_all_guest();
 $this->load->view('menu_visiteur');
 $this->load->view('invite_afficher',$data);
// $this->load->view('invite_afficher',$data);
 $this->load->view('templates/bas');
 }

public function gues()
 {


 //$data['poste'] = $this->db_model->get_all_invite_poste();
  $data['guest'] = $this->db_model->get_all_guest_by_anim();
 $this->load->view('menu_visiteur');
 $this->load->view('guest',$data);
// $this->load->view('invite_afficher',$data);
 $this->load->view('templates/bas');
 }



}
?>