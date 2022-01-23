<?php
if($_SESSION['statut']!= 'O'){
redirect(base_url()."index.php/compte/connecter");
}
else {
// ...
}

?>
<h2>Liste de tous les comptes</h2>
<?php
if($compte != NULL) {


?>

<table class="table table-striped ">
   

  <thead>
    <tr bgcolor="yellow">
 <th>Login</th>
 <th>Nom Organisateur</th>
 <th>Prénom Organisateur</th>
 <th>Adresse e-mail Organisateur</th>
 <th>Statut</th>
 <th>Etat du compte</th>
</tr>

  </thead>
  <tbody>
   <?php foreach($compte as $a){?>
    <tr>
      <td><?php echo $a["cpt_pseudo"]; ?></td>
      <td><?php echo $a["org_nom"]; ?></td>
      <td><?php echo $a["org_prenom"]; ?></td>
      <td><?php echo $a["org_email"]; ?></td>
      <td><?php echo $a["cpt_statut"]; ?></td>
      <td><?php echo $a["org_etat"]; ?></td>
    </tr>


  </tbody>
<?php 
} ?>
</table>
<?php

} 
else{
  echo"Aucune actualité pour l'instant !";
}
?>





