<?php
if($_SESSION['statut']!= 'I'){
redirect(base_url()."index.php/compte/connecter");
}
else {
// ...
}

?>
<h2>Espace d'invité</h2>
<br />
<h2>Session ouverte ! Bienvenue</h2>
<?php

//echo $this->session->userdata('statut');

echo $_SESSION['username'];
echo $_SESSION['statut'];
//echo $this->session->userdata('username');

?> 



<?php
if($newsI != NULL) {


?>

<table class="table ">
   

  <thead>
    <tr >
      <th  scope="col" >Nom</th>
      
      <th scope="col" >Pseudo</th>
      <th  scope="col" >Discipline</th>
      <th  scope="col" >Biographie</th>
      <th  scope="col">Photo</th>
      <th scope="col">Réseaux sociaux</th>

    </tr>
  </thead>
  <tbody>
   <?php foreach($newsI as $n){?>

    <tr>
      <td><?php echo $n["inv_nom"]; ?></td>
 
      <td><?php echo $n["cpt_pseudo"]; ?></td>
      <td><?php echo $n["inv_discipline"]; ?></td>
      <td><?php echo $n["inv_biographie"]; ?></td>
      <td><?php echo $n["inv_photo"]; ?></td>
 <?php foreach($urlI as $u){?>
      <td><?php echo $u["url_nom"];  ?></td>
      <?php
    }
    ?>
    </tr>

  </tbody>
<?php 
break;
} ?>
</table>
<?php

} 
else{
  echo"Aucune actualité pour l'instant !";
}
//echo "<td>"; echo "<button >MODIFIER</button>";  echo "</td>";
echo "<td>"; ?> <a class="nav-link" href="https://obiwan2.univ-brest.fr/licence/lic71/v2/CodeIgniter/index.php/compte/imdp">
                 MODIFIER
                </a> 
                <?php echo "</td>";
?>
