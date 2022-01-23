<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Compte extends CI_Controller {


 public function __construct()
 {
    parent::__construct();
    $this->load->model('db_model');
    $this->load->helper('url_helper');
}
//LISTE DES COMPTES

public function lister()
{
    $data['titre'] = 'Liste des pseudos :';
    $data['pseudos'] = $this->db_model->get_all_compte();
    $data['listeu'] = $this->db_model-> get_all_user_compte();

    $this->load->view('templates/haut');
    $this->load->view('compte_liste',$data);
    $this->load->view('templates/bas');
}


//CREATION DE COMPTE
public function creer()
{
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('id', 'id', 'required');
    $this->form_validation->set_rules('mdp', 'mdp', 'required');
    if ($this->form_validation->run() == FALSE)
    {
       $this->load->view('templates/haut');
       $this->load->view('compte_creer');
       $this->load->view('templates/bas');
   }
   else
   {
       $this->db_model->set_compte();
       $this->load->view('templates/haut');
       $this->load->view('compte_succes');
       $this->load->view('templates/bas');
   }
}



//GESTION DE CONNEXION
public function connecter()
{
   $this->load->helper('form');
   $this->load->library('form_validation');
   $this->form_validation->set_rules('pseudo', 'pseudo', 'required' , array('required'=>
    'Veuillez saisir identifiant !'));
   $this->form_validation->set_rules('mdp', 'mdp', 'required' , array('required'=>
    'Veuillez saisir le mot de passe !'));


   if ($this->form_validation->run() == FALSE)
   {

    $this->load->view('menu_visiteur');
    $this->load->view('compte_connecter');
    $this->load->view('templates/bas');
}
else
{
  $username = $this->input->post('pseudo');
  $password = $this->input->post('mdp');
  if($this->db_model->connect_compte($username,$password))
  {
   $statut = $this->db_model->get_statut($username);
   $session_data = array('username' => $username,'statut'=>$statut );
   //$session_data = array('username' => $username );
   $this->session->set_userdata($session_data);
            //$_SESSION['statut'] = $type;
   $_SESSION['login'] = $username;


   if ($_SESSION['statut'] == 'O') {
     $data['newsO'] = $this->db_model->get_news_org($username);
     $this->load->view('menu_administrateur');
     $this->load->view('accueil_administrateur',$data);

 }
 elseif ($_SESSION['statut'] == 'I') {
    $data['newsI'] = $this->db_model->get_news_invite($username);
    $this->load->view('menu_invite');
    $this->load->view('accueil_invite',$data);
    //$data['message_erreur'] = 'ERREUR!!';
}
else{echo "Utilisateur non existant ou désactivé";} 



//$this->load->view('templates/haut');
//$this->load->view('compte_menu');
 //$this->load->view('templates/bas');
}
//else{echo"pas bon identifiants";}
else
{
    echo"Identifiants erronés ou inexistants !";
    $this->load->view('templates/haut');
    $this->load->view('compte_connecter');
    $this->load->view('templates/bas');
}
}
}



//DEBUT UPDATE MOT DE PASSE ADMIN
public function amdp()
{
   $this->load->helper('form');
   $this->load->library('form_validation');
  //$this->form_validation->set_rules('pseudo', 'pseudo', 'required');
   $this->form_validation->set_rules('mdp', 'mdp', 'required' , array('required'=>
    'champs mot de passe vide!'));
   $this->form_validation->set_rules('mdp2', 'mdp2', 'required' , array('required'=>
    'champs confirmation mot de passe vide!'));


   if ($this->form_validation->run() == FALSE)
   {
    $this->load->view('menu_administrateur');
    $this->load->view('compte_amdp');
    $this->load->view('templates/bas');
}
else
{

               
  $mdp = $this->input->post('mdp');
  $mdp2 = $this->input->post('mdp2');
  if (empty($mdp))  {
     echo"Champs de saisie vides !";
         //redirect('https://obiwan2.univ-brest.fr/licence/lic71/dev/CodeIgniter/index.php/compte_imdp');
 }
 if (empty($mdp2) )  {
     echo"Champs de saisie vides !";
        //redirect('https://obiwan2.univ-brest.fr/licence/lic71/dev/CodeIgniter/index.php/compte_imdp');
 }


 if(strcmp($mdp, $mdp2)==0){
     $this->db_model->get_update_mdp_invite();
     $this->load->view('menu_administrateur');
     $this->load->view('compte_amdp');
     $this->load->view('templates/bas');
     echo "Opération réussi!";
 }
 else{ 
  //  $this->form_validation->set_message('Confirmation du mot de passe erronée, veuillez réessayer !');

    echo"Confirmation du mot de passe erronée, veuillez réessayer !";
    $this->load->view('menu_administrateur');
    $this->load->view('compte_amdp');
    $this->load->view('templates/bas');
}



} 
}
//get_update_mdp_admin($username, $password)
//FIN UPDATE MOT DE PASSE ADMIN


//DEBUT UPDATE MOT DE PASSE INVITE
public function imdp()
{
   $this->load->helper('form');
   $this->load->library('form_validation');
  //$this->form_validation->set_rules('pseudo', 'pseudo', 'required');
   $this->form_validation->set_rules('mdp', 'mdp', 'required' , array('required'=>
    'champs mot de passe vide!'));
   $this->form_validation->set_rules('mdp2', 'mdp2', 'required' , array('required'=>
    'champs confirmation mot de passe vide!'));



   if ($this->form_validation->run() == FALSE)
   {
    $this->load->view('menu_invite');
    $this->load->view('compte_imdp');
    $this->load->view('templates/bas');
}
else
{
  $mdp = $this->input->post('mdp');
  $mdp2 = $this->input->post('mdp2');

  if(strcmp($mdp, $mdp2)==0){
     $this->db_model->get_update_mdp_invite();
     $this->load->view('menu_invite');
     $this->load->view('compte_succes');
     $this->load->view('templates/bas');
     echo "Opération réussi!";
 }
 else{ 
  //  $this->form_validation->set_message('Confirmation du mot de passe erronée, veuillez réessayer !');

    echo"Confirmation du mot de passe erronée, veuillez réessayer !";
    $this->load->view('menu_invite');
    $this->load->view('compte_imdp');
    $this->load->view('templates/bas');
}



} 
}
//get_update_mdp_admin($username, $password)
//FIN UPDATE MOT DE PASSE INVITE


//GESTION DE LA PROGRAMMATION CHEZ LADMIN
public function programation_org($numero =FALSE){
    //$data['titre'] = 'Liste des pseudos :';
    //$data['pseudos'] = $this->db_model->get_all_compte();
    $data['progo'] = $this->db_model->get_all_programmation_admin();
    $data['anim'] = $this->db_model->get_all_animation();
    $data['ladate'] = $this->db_model->get_ladate();

    $this->load->view('menu_administrateur');
    $this->load->view('admin_programmation',$data);
    $this->load->view('templates/bas');

}


//Profil de l'admin
public function profil_admin(){

    $data['newsO'] = $this->db_model->get_news_org();
    //$data['stat'] = $this->db_model->get_statut_utilisateur();
    $this->load->view('menu_administrateur');
    $this->load->view('profil_admin',$data);
    $this->load->view('templates/bas');

}


//Profil de l'admin mot de passe
public function mdp_compte(){
    $data['newsO'] = $this->db_model->get_news_org();

    $this->load->view('menu_administrateur');
    $this->load->view('admin_mdp',$data);
    $this->load->view('templates/bas');

}

//MonProfil invité 

public function profil_invite(){

    $data['newsI'] = $this->db_model->get_news_invite();
    $data['urlI'] = $this->db_model->get_news_invite_url();
    //$data['urlI'] = $this->db_model->get_news_invite_url();

    
/*
        $data['passI'] = $this->db_model->get_news_invite();
 $data['poste'] = $this->db_model->get_all_invite_poste2();
 $data['url'] = $this->db_model->get_all_url2();
 $data['guest'] = $this->db_model->get_all_guest2();
 */
    //$data['urlI'] = $this->db_model->get_news_invite_url();
 $this->load->view('menu_invite');
 $this->load->view('profil_invite',$data);
 $this->load->view('templates/bas');
}



public function affichage_compte_org(){
    //$data['titre'] = 'Liste des pseudos :';
    //$data['pseudos'] = $this->db_model->get_all_compte();
   // $data['progo'] = $this->db_model->get_all_programmation_admin();
    //$data['anim'] = $this->db_model->get_all_animation();
    $data['compte'] = $this->db_model->get_all_comptes_admin();

    $this->load->view('menu_administrateur');
    $this->load->view('admin_compte_affichage',$data);
    $this->load->view('templates/bas');

}
/*
//Passports
public function passport(){
    $data['passI'] = $this->db_model->get_all_passport($username);

    $this->load->view('menu_administrateur');
    $this->load->view('passport_invite',$data);
    $this->load->view('templates/bas');

}
*/



//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************DEBUT passport invités************************************************************
public function passport_invite(){

    $data['passI'] = $this->db_model->get_news_invite();
    $data['poste'] = $this->db_model->get_all_invite_poste2();
    $data['url'] = $this->db_model->get_all_url2();
    $data['guest'] = $this->db_model->get_all_guest2();
    //$data['urlI'] = $this->db_model->get_news_invite_url();
    $this->load->view('menu_invite');
    $this->load->view('passport_invite',$data);
    $this->load->view('templates/bas');
}

//**********************************************************************FIN passport invités**************************************************************

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************DEBUT staff post************************************************************
public function spost(){

   $this->load->helper('form');
   $this->load->library('form_validation');
  //$this->form_validation->set_rules('pseudo', 'pseudo', 'required');
   $this->form_validation->set_rules('text1', 'text1', 'required' , array('required'=>
    'Identifiant vide!'));
   $this->form_validation->set_rules('text2', 'text2', 'required' , array('required'=>
    'Zone de text vide!'));
   $this->form_validation->set_rules('mdp', 'mdp', 'required' , array('required'=>
    'champs mot de passe vide!'));
   //$this->form_validation->set_rules('text2', 'text2', 'max_length[140]' , array('required'=>
    //'Un post a 140 caractères maximum!'));


   if ($this->form_validation->run() == FALSE)
   {
    $this->load->view('menu_visiteur');
    $this->load->view('compte_spost');
    $this->load->view('templates/bas');
}
else
{
  $text1 = $this->input->post('text1');
  $text2 = $this->input->post('text2');

  if($this->db_model->verif_post()==true){
     $this->db_model->add_post();
     $this->load->view('menu_visiteur');
     $this->load->view('compte_spost');
     $this->load->view('templates/bas');
     echo "Opération réussi!";
  //redirect('https://obiwan2.univ-brest.fr/licence/lic71/dev/CodeIgniter/index.php/compte/connecter');
   //echo "Opération réussi!";
 }
 else{ 
  //  $this->form_validation->set_message('Confirmation du mot de passe erronée, veuillez réessayer !');

    echo"Code(s) erroné(s), aucun passeport trouvé !";
 // redirect('https://obiwan2.univ-brest.fr/licence/lic71/dev/CodeIgniter/index.php/compte/connecter');
 // echo"Identifiants erronés!";
    $this->load->view('menu_visiteur');
    $this->load->view('compte_spost');
    $this->load->view('templates/bas');
}



} 
}

//**********************************************************************FIN staff post**************************************************************

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************DEBUT CONFIRMATION SUPPRESSION ANIMATION************************************************************

public function confirmation_supprimer_animation_admin()
{

  

    // $data['anim'] = $this->db_model->delete_prog_admin($numero);
 $data['anim'] = $this->db_model->get_all_animation();
     $this->load->view('menu_administrateur');
     $this->load->view('confirmation');
     $this->load->view('templates/bas');
 

}

//**********************************************************************FIN CONFIRMATION SUPPRESSION ANIMATION**************************************************************

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************DEBUT SUPPRESSION ANIMATION************************************************************

public function supprimer_animation_admin($numero =FALSE)
{

    if ($numero==FALSE)
     { $url=base_url(); header("Location:$url");}
 else{

     $data['anima'] = $this->db_model->delete_prog_admin($numero);
     $data['anim'] = $this->db_model->get_all_animation();
     $this->load->view('menu_administrateur');
     //$this->load->view('confirmation',$data);
     $this->load->view('delete',$data);
     $this->load->view('templates/bas');
 }

}

//**********************************************************************FIN SUPPRESSION ANIMATION**************************************************************

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************






















public function deconnexion()
{

 //$this->session->destroy();
 session_destroy();
 redirect('https://obiwan2.univ-brest.fr/licence/lic71/v2/CodeIgniter/index.php/accueil/afficher');

}









}
