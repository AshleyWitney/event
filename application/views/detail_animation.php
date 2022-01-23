<h1><?php echo $titre;?></h1>
<br />
<?php
if(isset($danim)) {
echo $danim->ani_libelle;
}
else {echo "<br />";
echo "pas d’actualité !";
}
?>


<?php
if(isset($danim)) {


?>

<table class="table table-striped ">
   

  <thead>
    <tr bgcolor="yellow">
      <th scope="col">Titre</th>
      <th scope="col">Description</th>
      <th scope="col">Date début</th>
      <th scope="col">Date de fin</th>
       <th scope="col">Lieu</th>
       <th scope="col">Description du lieu</th>
    </tr>
  </thead>
  <tbody>
   
    <tr>
      <td><?php echo $danim->ani_libelle; ?></td>
      <td><?php echo $danim->ani_description; ?></td>
      <td><?php echo $danim->ani_debut; ?></td>
      <td><?php echo $danim->ani_fin; ?></td>
      <td><?php echo $danim->lieu_nom; ?></td>
        <td><?php echo $danim->lieu_descriptif; ?></td>
   
    </tr>

  </tbody>
<?php 
}
else {echo "<br />";
echo "pas de détail !";
} 
?>
</table>
