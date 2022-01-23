<?php
if($_SESSION['statut']!= 'O'){
redirect(base_url()."index.php/compte/connecter");
}
else {
// ...
}
?>
<h2>Veuillez  CONFIRMER</h2>

 <?/*php foreach($anim as $n){break;

} 
?>

<a class="btn btn-large btn-primary" 
   href="<?php echo base_url();?>index.php/compte/supprimer_animation_admin/<?php echo $n['ani_id'] ?>" >Supprimer</a>

<?php 


<a class="btn btn-large btn-primary" 
   href="<?php echo base_url();?>index.php/compte/programation_org" >Annuler</a>

*/
