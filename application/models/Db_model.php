<?php
class Db_model extends CI_Model {
 public function __construct()
 {
 $this->load->database();
 }

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************RECUPERATION DE TOUS DES COMPTES***********************************************************
 
 public function get_all_compte()
{
$query = $this->db->query("SELECT cpt_pseudo FROM t_compte_cpt;");
return $query->result_array();
}

 public function get_all_user_compte()
{
$query = $this->db->query("
SELECT COUNT(*) FROM t_compte_cpt
where cpt_statut = 'I';");
return $query->result_array();
}


//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************RECUPERATION DE TOUS DES COMPTES***********************************************************
 

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************RECUPERATION DEs ACTUALITES ET ANIMATION**********************************************************
 



 public function get_actualite($numero)
{
$query = $this->db->query("SELECT * FROM t_actualite_act WHERE
act_id=".$numero.";");
return $query->row();
}

public function get_all_actualite()
{
$query = $this->db->query("
    SELECT * from t_actualite_act
join t_organisateur_or USING(org_id)
where act_etat = 'A'
ORDER by act_date DESC
LIMIT 5;");
return $query->result_array();
}



public function get_all_animation()
{
$query = $this->db->query("
    SELECT * from t_animation_ani
left join t_programmation_pro USING(ani_id)
left join t_invite_inv USING(inv_id)
left join t_lieu_lie USING(lieu_id)


order by ani_debut DESC;

    ");
return $query->result_array();
}


//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************RECUPERATION DEs ACTUALITES ET ANIMATION**********************************************************
 

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//************************************************************RECUPERATION DE LA DATE COURANTE**********************************************************
 

public function get_ladate()
{
$query = $this->db->query("
SELECT NOW() as ladatee;
    ");
return $query->row();
}


//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//************************************************************RECUPERATION DE LA DATE COURANTE**********************************************************
 


//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//************************************************************GESTION DES INVITES  GALLERIE*********************************************************
 
public function get_all_guest_by_anim()
{
$query = $this->db->query("
    SELECT * from t_animation_ani
left join t_programmation_pro USING(ani_id)
left join t_invite_inv USING(inv_id)
left join t_lieu_lie USING(lieu_id)
order by inv_nom;

    ");
return $query->result_array();
}




public function get_all_programmation()
{
$query = $this->db->query("
    SELECT * from t_animation_ani
left join t_programmation_pro USING(ani_id)
left join t_invite_inv USING(inv_id)
left join t_lieu_lie USING(lieu_id)
order by inv_nom;

    ");
return $query->result_array();
}

public function get_all_invite_poste()
{
$query = $this->db->query("
SELECT * FROM t_invite_inv
 left join t_passeport_pas USING(inv_id)
left join t_post_pos USING(pas_id)
WHERE inv_etat = 'A'
order by pos_date DESC;

    ");
return $query->result_array();
}

public function get_all_url()
{
$query = $this->db->query("
SELECT url_nom,inv_nom,inv_id from t_invite_inv
left join t_invite_url_inv USING(inv_id)
left join t_url_url USING(url_id);
    ");
return $query->result_array();
}



public function get_all_guest()
{
$query = $this->db->query("
SELECT * from t_invite_inv
left join t_passeport_pas USING(inv_id)
left JOIN t_post_pos USING (pas_id)

    ");
return $query->result_array();
}

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//************************************************************GESTION DES INVITES  GALLERIE*********************************************************
 
//DEBUT RECUPERATION LIEUX ET SERVICE
public function get_all_lieux_service()
{
$query = $this->db->query("
SELECT * from t_lieu_lie
LEFT OUTER join t_service_ser USING(lieu_id);

    ");
return $query->result_array();
}
//FIN RECUPERATION LIEUX ET SERVICES


//DEBUT RECUPERATION TOUS LES COMPTES POUR LISTER LES COMPTES DANS LA PAGE ADMIN
public function get_all_comptes_admin()
{
$query = $this->db->query("
SELECT * from t_compte_cpt
left join t_invite_inv USING(cpt_pseudo)
left join t_organisateur_or USING(cpt_pseudo)
group by cpt_pseudo

    ");
return $query->result_array();
}
//FIN RECUPERATION TOUS LES COMPTES POUR LISTER LES COMPTES DANS LA PAGE ADMIN





// ETAPE INSERER DES DONNEES 
public function set_compte()
{
 $this->load->helper('url');
 $id=$this->input->post('id');
$mdp=$this->input->post('mdp');
                    $id= htmlspecialchars(addslashes($_POST["mdp"]));
                    $mdp = htmlspecialchars(addslashes($_POST["mdp2"]));
$req="INSERT INTO t_compte_cpt VALUES ('".$id."','".$mdp."','A');";
$query = $this->db->query($req);
return ($query);
}



//CONNEXION
/*
public function connect_compte($username, $password)
{
$query =$this->db->query("SELECT cpt_pseudo,cpt_mot_de_passe,cpt_statut
FROM t_compte_cpt
WHERE cpt_pseudo='".$username."'
AND cpt_mot_de_passe='".$password."';");
 if($query->num_rows() > 0)
 {
 return true;}
 else
 {
 return false;
 }
}
*/
//DEBUT HASHAGESEL256 DU MOT DE PASSE
/*
public function get_sel_mdp($username, $password)
{
$salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";

// Le mot de passe rallongé sera donc :
// OnRajouteDuSelPourAllongerleMDP123!!45678__TestCeciEstMonMotdePasse!123
$password = hash('sha256', $salt.$password);
$query =$this->db->query("UPDATE t_compte_cpt SET cpt_mot_de_passe='".$password."' WHERE cpt_pseudo='".$username."'; ");
return $query->result_array();

}
*/
//DEBUT HASHAGESEL256 DU MOT DE PASSE



public function connect_compte($username, $password)
{
$salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";

// Le mot de passe rallongé sera donc :
// OnRajouteDuSelPourAllongerleMDP123!!45678__TestCeciEstMonMotdePasse!123
$password = hash('sha256', $salt.$password);
  

//requetes
$query =$this->db->query("SELECT cpt_pseudo,cpt_mot_de_passe,cpt_statut
FROM t_compte_cpt
WHERE cpt_pseudo='".$username."'
AND cpt_mot_de_passe='".$password."';");
 if($query->num_rows() > 0)
 {
 return true;}
 else
 {
 return false;
 }

}

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************DEBUT FONCTION POUR VISUALISE LE STATUT************************************************************
/*
public function get_statut_utilisateur()
{
$req=("
    DELIMITER //
CREATE FUNCTION  visualiser_statut_utilisateur as st('".$_SESSION['username']."' varchar (500)) RETURNS varchar(500)
BEGIN 
DECLARE res varchar(500);
SELECT cpt_statut INTO @res FROM t_compte_cpt WHERE cpt_pseudo = '".$_SESSION['username']."' ; 
RETURN @res; 
END;
//
DELIMITER ;

SELECT visualiser_statut_utilisateur('".$_SESSION['username']."');
    ;");
$query = $this->db->query($req);
return ($query);

}

*/
//**********************************************************************FIN FONCTION POUR VISUALISE LE STATUT**************************************************************

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************











//CONNEXION
/*//function qui recupere le statut
DROP FUNCTION IF EXISTS statut; DELIMITER // CREATE FUNCTION statut(stat TINYTEXT) RETURNS CHARACTER BEGIN SELECT cpt_statut INTO @res FROM t_compte_cpt WHERE cpt_pseudo=stat ; RETURN @res; END; // DELIMITER ; SELECT statut('burna');
*/
/*
public function get_stat($username){
DROP FUNCTION IF EXISTS statut; 
DELIMITER //
CREATE FUNCTION statut() RETURNS TINYTEXT
BEGIN 
SELECT cpt_statut INTO @res FROM t_compte_cpt WHERE cpt_pseudo='".$username."' ; 
RETURN @res; 
END; 
// DELIMITER ; 
SELECT statut();
}
*/



public function get_statut($username)
{
$query1 =$this->db->query("SELECT cpt_pseudo FROM t_organisateur_or WHERE cpt_pseudo='".$username."'  and org_etat='A'; ");
$query2 =$this->db->query("SELECT cpt_pseudo FROM t_invite_inv  WHERE cpt_pseudo='".$username."'  and inv_etat='A'; ");

 if($query1->num_rows() > 0){ return 'O';}
  if($query2->num_rows() > 0){ return 'I';}

}




//DEBUT INFORMATION DE L'ORGANISATEUR!
public function get_news_org()
{
$query1 =$this->db->query("SELECT * from t_organisateur_or where cpt_pseudo='".$_SESSION['username']."'; ");
return $query1->result_array();

}
//FIN INFORMATION DE L'ORGANISATEUR!

//DEBUT INFORMATION DE L'INVITE DANS PROFIL!
public function get_news_invite()
{
    
$query =$this->db->query("SELECT cpt_pseudo,inv_nom,inv_prenom,inv_discipline,inv_biographie,inv_photo from t_compte_cpt 
join t_invite_inv USING(cpt_pseudo)  where cpt_pseudo='".$_SESSION['username']."'; ");
return $query->result_array();

/*
$query =$this->db->query("SELECT * ,GROUP_CONCAT(url_nom SEPARATOR '##')
as lieninvite from t_invite_inv
LEFT outer join t_invite_url_inv USING(inv_id)
LEFT outer join t_url_url USING (url_id)
 where cpt_pseudo='".$_SESSION['username']."'; ");
return $query->result_array();
*/

}
/*SELECT url_nom from t_url_url
join t_invite_url_inv using( url_id)*/


public function get_news_invite_url()
{
$query =$this->db->query("SELECT * from t_url_url
join t_invite_url_inv USING(url_id) join t_invite_inv using(inv_id) join t_compte_cpt using(cpt_pseudo) where cpt_pseudo='".$_SESSION['username']."'; ");
return $query->result_array();

}


//FIN INFORMATION DE L'INVITE DANS PROFIL!



//debut requete programmation pour compte admin
public function get_all_programmation_admin()
{
$query = $this->db->query("
    SELECT * from t_animation_ani
left join t_programmation_pro USING(ani_id)
left join t_invite_inv USING(inv_id)
left join t_lieu_lie USING(lieu_id)

order by inv_nom;
    ");
return $query->result_array();
}
//Fin requete programmation pour compte admin

/*
//debut requete passport
public function get_all_passport()
{
$query = $this->db->query("
SELECT * from t_passeport_pas
left join t_invite_inv USING(inv_id)
left join t_post_pos using (pas_id)
WHERE cpt_pseudo = '".$username."'

    ");
return $query->result_array();
}
//Fin requete passport

*/

//DEBUT REQUETE UPDATE MDPADMIN

public function get_update_mdp_admin()
{

$this->load->helper('url');
$salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";

// Le mot de passe rallongé sera donc :
// OnRajouteDuSelPourAllongerleMDP123!!45678__TestCeciEstMonMotdePasse!123

 $mdp=$this->input->post('mdp');
$mdp2=$this->input->post('mdp2');
$mdp = hash('sha256', $salt.$mdp);
$req="UPDATE t_compte_cpt set cpt_mot_de_passe ='".$mdp."' where cpt_pseudo='".$_SESSION['username']."';;";
$query = $this->db->query($req);
return ($query);

}
//FIN REQUETE UPDATE MDPADMIN

//DEBUT REQUETE UPDATE MDPADMIN

public function get_update_mdp_invite()
{

$this->load->helper('url');
$salt = "OnRajouteDuSelPourAllongerleMDP123!!45678__Test";

// Le mot de passe rallongé sera donc :
// OnRajouteDuSelPourAllongerleMDP123!!45678__TestCeciEstMonMotdePasse!123

 $mdp=$this->input->post('mdp');
$mdp2=$this->input->post('mdp2');
$mdp = hash('sha256', $salt.$mdp);

$req="UPDATE t_compte_cpt set cpt_mot_de_passe ='".$mdp."' where cpt_pseudo='".$_SESSION['username']."' ;";
$query = $this->db->query($req);
return ($query);


}
//FIN REQUETE UPDATE MDPADMIN


//**********************************************************************DEBUT DETAIL ANIMATION************************************************************
public function get_detail_anim($numero)
{
$query = $this->db->query("SELECT * from t_animation_ani join t_lieu_lie using (lieu_id) WHERE ani_id = ".$numero." ;");
return $query->row();

}

//**********************************************************************FIN DETAIL ANIMATION**************************************************************
//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************DEBUT DETAIL Invité************************************************************
public function get_detail_inv($numero)
{
$query = $this->db->query("SELECT * from t_invite_inv
join t_programmation_pro USING (inv_id)
 join t_animation_ani USING(ani_id)
where ani_id = ".$numero.";");
return $query->result_array();

}
public function get_all_invite_poste7($numero)
{
$query = $this->db->query("
SELECT * FROM t_invite_inv
 left join t_passeport_pas USING(inv_id)
 LEFT join t_post_pos USING(pas_id)
 join t_programmation_pro USING (inv_id)
 join t_animation_ani USING(ani_id)


WHERE inv_etat = 'A' and ani_id = ".$numero."
order by pos_date DESC;

    ");
return $query->result_array();
}

public function get_all_url7($numero)
{
$query = $this->db->query("
SELECT url_nom,inv_nom,inv_id from t_invite_inv
join t_invite_url_inv USING(inv_id)
join t_url_url USING(url_id)
join t_programmation_pro using (inv_id)
join t_animation_ani USING(ani_id)
where ani_id = ".$numero.";
    ");
return $query->result_array();
}



public function get_all_guest7($numero)
{
$query = $this->db->query("
SELECT * from t_invite_inv
left join t_passeport_pas USING(inv_id)
left JOIN t_post_pos USING (pas_id)
join t_programmation_pro USING(inv_id)
join t_animation_ani USING(ani_id)
where ani_id = ".$numero.";

    ");
return $query->result_array();
}
public function get_all_lieux_service7($numero)
{
$query = $this->db->query("
SELECT * from t_lieu_lie
LEFT OUTER join t_service_ser USING(lieu_id)
left outer join t_animation_ani USING(lieu_id)
WHERE ani_id = ".$numero.";

    ");
return $query->result_array();
}
//FIN RECUPERATION LIEUX ET SERVICES

//**********************************************************************FIN DETAIL Invité**************************************************************

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************DEBUT DETAIL Lieu************************************************************
public function get_detail_lieu($numero)
{
$query = $this->db->query("SELECT * from t_lieu_lie WHERE lieu_id = ".$numero." ;");
return $query->row();

}

//**********************************************************************FIN DETAIL Lieu**************************************************************

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************DEBUT INFOS INVITES ACCUEIL************************************************************
public function get_news_inv()
{
$query = $this->db->query("SELECT * from t_invite_inv ;");
return $query->result_array();

}

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************DEBUT PASSPORT INVITE************************************************************
public function get_all_invite_poste2()
{
$query = $this->db->query("
SELECT * FROM t_invite_inv
 left join t_passeport_pas USING(inv_id)
left join t_post_pos USING(pas_id)
WHERE inv_etat = 'A' and cpt_pseudo='".$_SESSION['username']."'
order by pos_date DESC;

    ");
return $query->result_array();
}

public function get_all_url2()
{
$query = $this->db->query("
SELECT url_nom,inv_nom,inv_id from t_invite_inv
join t_invite_url_inv USING(inv_id)
join t_url_url USING(url_id)
WHERE cpt_pseudo='".$_SESSION['username']."';
    ");
return $query->result_array();
}
public function get_all_guest2()
{
$query = $this->db->query("
SELECT * from t_invite_inv
left join t_passeport_pas USING(inv_id)
left JOIN t_post_pos USING (pas_id)
where cpt_pseudo='".$_SESSION['username']."';
    ");
return $query->result_array();
}

//**********************************************************************FIN PASSPORT INVITE**************************************************************

//**************************************************************************************************************************************************
//**************************************************************************************************************************************************


//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************DEBUT AJOUT POST************************************************************
public function add_post()
{
$text1=$this->input->post('text1');
$text2=$this->input->post('text2');
$req = "INSERT INTO t_post_pos  VALUES (null,'".$text2."',curdate(), '".$text1."', 'A') ;";
$query = $this->db->query($req);
return ($query);
}




public function verif_post()
{
$text1=$this->input->post('text1');
//$text2=$this->input->post('text2');
$mdp=$this->input->post('mdp');
//requetes
$query =$this->db->query("SELECT pas_id
FROM t_passeport_pas
WHERE pas_id='".$text1."'
AND pas_mdp='".$mdp."';");

 if($query->num_rows() > 0)
 {
 return true;}
 else
 {
 return false;
 }
 
 


}


//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************DEBUT AJOUT POST************************************************************



//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************DEBUT SUPPRESSION ANIMATION************************************************************





/*

 public function get_detail_anim($numero)
{
$query = $this->db->query("SELECT * from t_animation_ani join t_lieu_lie using (lieu_id) WHERE ani_id = ".$numero." ;");
return $query->row();

}
*/




public function list_all_prog_delete()
{

$query = $this->db->query("SELECT * from t_animation_ani
join t_programmation_pro");

}




public function delete_prog_admin($numero)
{


$req="CALL supprimer_animation($numero);";
$query = $this->db->query($req);
return ($query);
 
 


}


//**************************************************************************************************************************************************
//**************************************************************************************************************************************************
//**********************************************************************FIN  SUPPRESSION ANIMATION************************************************************






















}


