

//ANIMATION ET INVITES

<?php
if ($prog != NULL){
?>
<table class="table table-bordered" class="table table-striped">
 <thead>
 <tr>
     <th>Animation(s)</th>
 <th>Invité(s)</th>
  <th>Détails</th>
    <th>Galérie des invités</th>


 </tr>
 </thead>
 <tbody>

<?php
// Boucle de parcours de toutes les lignes du résultat obtenu
foreach($prog as $p){
// Affichage d’une ligne de tableau pour un pseudo non encore traité
if (!isset($traite[$p["ani_id"]])){
$animation_id=$p["ani_id"];
echo "<tr>";
echo "<td>"; if ($p["ani_libelle"] != NULL) {
  echo $p["ani_libelle"]; echo "<br />";    //echo ("<img width='50%' src='https://obiwan2.univ-brest.fr/licence/lic71/dev/CodeIgniter/style/assets/img/invite/".$p['inv_photo']."' >");
} else {echo "PAS D'ANIMATION POUR LE MOMENT";};echo "</td>";
echo "<td>";
?>
    <section id="schedules" class="schedule section-padding">
<table class="table table-striped">

  <tbody>

  
    <tr>
    
      <td>
        <?php
        echo "<ul>";
        foreach($prog as $pro){ 
if(strcmp($animation_id,$pro["ani_id"])==0){

echo "<li>";
echo $pro["inv_nom"];
echo "  Participe à : ";
echo "<br />";
if ($pro["inv_id"] != NULL) {
  echo "Invité de cette animation nom : ";
echo " ";
echo $pro["inv_nom"];
echo "<br />";
echo "<br />";
echo " Biographie: ";
echo "  ";
echo $pro["inv_biographie"];
echo "<br />";
echo "<br />";
echo " Discipline : ";
echo " ";
echo $pro["inv_discipline :  "];
echo "<br />";
echo "<br />";
echo " Photo :  ";
echo ("<img width='15%' src='https://obiwan2.univ-brest.fr/licence/lic71/v2/CodeIgniter/style/assets/img/invite/".$p['inv_photo']."' >");
echo " ";
echo "<br />";
echo "<br />";
echo " Debut de l'animation : ";
echo " ";
echo $pro["ani_debut"];
echo " FIN : ";
echo " ";
echo $pro["ani_fin"];
}
else{echo"Pas d'animation pour l'instant'";};

echo "<br />";
echo " LIEU: ";
echo " ";
if ($pro["lieu_nom"] != NULL) {
 echo $pro["lieu_nom"];
}
else{echo "Pas de lieu pour l'instant";};

echo " ********** ";
echo "<br />";
echo "Voir plus : ";
echo "<br />";
echo "<br />";
echo "<br />";


echo "</li>";
}
echo "</ul>";
}?>
      </td>

    </tr>

  </tbody>
</table>
    </section>
    <?php
// Boucle d’affichage des animations par animation


echo "</td>";



// Conservation du traitement du pseudo
// (dans un tableau associatif dans cet exemple !)
$traite[$p["ani_id"]]=1;
echo "</tr>";
}
}
}
else {
echo "<br />";
echo "Aucun résultat !";
}
?>
 </tbody>
</table>