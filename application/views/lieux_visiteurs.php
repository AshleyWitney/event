





<h2>Lieux et services associés</h2>
 <!-- Début Tableau des actualités classées par pseudo  -->
<?php
if ($lieuser != NULL){
?>
<table class="table table-bordered">
 <thead>
 <tr>
 <th>Lieux</th>
 <th>Description</th>
 <th>Services</th>
 </tr>
 </thead>
 <tbody>

<?php
// Boucle de parcours de toutes les lignes du résultat obtenu
foreach($lieuser as $a){
// Affichage d’une ligne de tableau pour un pseudo non encore traité
    if ($a["lieu_id"] != NULL) {
if (!isset($traite[$a["lieu_id"]])){

    // code...
  
$cpt_id=$a["lieu_id"];
echo "<tr>";
echo "<td>";echo $a["lieu_nom"];echo "</td>";
echo "<td>";echo $a["lieu_descriptif"];echo "</td>";
echo "<td>";
// Boucle d’affichage des actualités liées au pseudo
foreach($lieuser as $act){
echo "<ul>";
if(strcmp($cpt_id,$act["lieu_id"])==0){
echo "<li>";
if ($act["ser_nom"] != NULL) {
echo $act["ser_nom"];
}else {echo"Pas de service pour l'instant!";}

echo "</li>";


}
echo "</ul>";
}
echo "</td>";
// Conservation du traitement du pseudo
// (dans un tableau associatif dans cet exemple !)
$traite[$a["lieu_id"]]=1;
echo "</tr>";
}

}
//
}
}


else{ echo"Pas de lieu pour l'instant !"; }

?>
 </tbody>
</table>