<?php
if($_SESSION['statut']!= 'O'){
redirect(base_url()."index.php/compte/connecter");
}
else {
// ...
}

?>
<h2>Espace d'administration</h2>
<br />
<h2>Session ouverte ! Bienvenue</h2>
<?php

//echo $this->session->userdata('statut');

echo $_SESSION['username'];
echo"<br>";
echo"Statu : ";
echo $_SESSION['statut'];
//echo $this->session->userdata('username');

?> 



<?php
if($newsO != NULL) {


?>

<table class="table table-striped ">
   

  <thead>
    <tr bgcolor="yellow">
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Pseudo</th>
      <th scope="col">Mail</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($newsO as $n){?>
    <tr>
      <td><?php echo $n["org_nom"]; ?></td>
      <td><?php echo $n["org_prenom"]; ?></td>
      <td><?php echo $n["cpt_pseudo"]; ?></td>
      <td><?php echo $n["org_email"]; ?></td>
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
echo "<td>"; ?> <a class="nav-link" href="https://obiwan2.univ-brest.fr/licence/lic71/v2/CodeIgniter/index.php/compte/amdp">
                 MODIFIER
                </a> 
                <?php echo "</td>";
?>
