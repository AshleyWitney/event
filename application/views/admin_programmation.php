<?php
if($_SESSION['statut']!= 'O'){
redirect(base_url()."index.php/compte/connecter");
}
else {
// ...
}

?>
<h2>Ajouter une animation</h2>


<br />
<?php
if(isset($ladate)) {
//$_GET['variable']
echo "";


}
else {echo "<br />";
echo "pas d’actualité !";
}
?>
<?php
echo "<td>"; echo "<button >Ajouter</button>"; echo "</td>";
?>
<?php
//echo $ladate;
if ($anim != NULL and $ladate !=NULL){
?>

<table class="table table-bordered" class="table table-striped">
 <thead>

 <tr  >
 <th>Animations(s)</th>
 <th><center>Invités</center></th>
  <th><center>Début</center></th>
    <th><center>Fin</center></th>
    <th><center>Lieu</center></th>
        <th><center>Supprimer</center></th>
    <th><center>Mettre à jour</center></th>


 </tr>

 </thead>
 <tbody>

<?php
// Boucle de parcours de toutes les lignes du résultat obten
/*******************************************************DEBUT ANIMATION AVENIR************************************************************************************************
 *************************************************************************************************************************************************************************** */

  foreach($ladate as $d) {
    foreach($anim as $t){
          if($d < $t['ani_debut']){
            echo "<tr style='background-color: pink; '>";
echo "<td >"; echo "<th >"; echo "<center>";echo"Animations A VENIR"; echo "</center>";echo"</th>"; echo "</td>";
echo "</tr>";
          }
          break;

    }


foreach($anim as $an) {

  //conditions affichant que les animation a venir

//DEBUT ELIF
if ($an['ani_debut'] > $d) {

  // Affichage d’une ligne de tableau pour un pseudo non encore traité
if (!isset($traite[$an["ani_id"]])){
$anima_id=$an["ani_id"];


echo "<tr>";



echo "<td>";echo " <br>"; echo $an["ani_libelle"];echo "</td>";
echo "<td>";
// Boucle d’affichage des actualités liées au pseudo

foreach($anim as $ani){
echo "<ul>";
if(strcmp($anima_id,$ani["ani_id"])==0 ){
    if ($ani["ani_id"] != NULL){
        echo $ani["ani_libelle"];

    }else{echo"Pas d'animation";}
echo "<li>";
echo $ani["inv_nom"];
echo "  Participe à : ";
echo "<br />";
 echo $ani["ani_libelle"];
 echo "<br />";
      if ($ani["ani_debut"] != NULL) {
 echo "<li>";
 echo "  Début :  ";
echo $ani["ani_debut"];
 echo "  Fin : ";
echo $ani["ani_fin"];
echo "<br />";
  }else{echo"Pas d'horaire pour le moment";}
if ($ani["inv_id"] != NULL) {
  echo "Invité de cette animation nom : ";
echo " ";
echo $ani["inv_nom"];
echo "<br />";
echo "<br />";
echo " Biographie: ";
echo "  ";
echo $ani["inv_biographie"];
echo "<br />";
echo "<br />";
echo " Discipline : ";
echo " ";
echo $ani["inv_discipline"];
echo "<br />";
echo "<br />";
echo " Photo : ";
echo " ";
echo ("<img width='10%' src='https://obiwan2.univ-brest.fr/licence/lic71/v2/CodeIgniter/style/assets/img/invite/".$ani['inv_photo']."' >");
echo "<br />";
echo "<br />";
echo " Debut de l'animation : ";
echo " ";
echo $ani["ani_debut"];
echo "<br />";
echo "<br />";
echo " FIN : ";
echo " ";
echo $ani["ani_fin"];
}
else{echo"Pas d'invité pour l'instant et donc pas de PROGRAMMATION!";};

echo "<br />";
echo " LIEU: ";
echo " ";
if ($ani["lieu_nom"] != NULL) {
 echo $ani["lieu_nom"];
}
else{echo "Pas de lieu pour l'instant";};

echo "<br />";
echo "<br />";
echo "<br />";
echo"<h3>";echo"Sur le même évènement : "; echo $ani["ani_libelle"];echo"</h3>";
echo "<br />";
echo "<br />";
echo "<br />";
//

echo "</li>";


}
echo "</ul>";
}
echo "</td>";
//tableau debut
echo "<td>"; 
      if ($an["ani_debut"] != NULL) {

echo $an["ani_debut"];

  }else{echo"Pas d'horaire pour le moment";}
 echo "</td>";
 //tableau fin
 echo "<td>"; 
       if ($an["ani_fin"] != NULL) {


echo $an["ani_fin"];

  }else{echo"Pas d'horaire pour le moment";}
 echo "</td>";
 //tableau lieu
echo "<td>"; 
if ($an["lieu_nom"] != NULL) {
 echo $an["lieu_nom"];
}
else{echo "Pas de lieu pour l'instant";};
echo "</td>";
//tableau boutons

echo "<td>"; ?> <a class="nav-link" href="<?php echo base_url();?>index.php/compte/supprimer_animation_admin/<?php echo $an['ani_id'] ?>">
               Supprimer
                </a> 
                <?php echo "</td>";
echo "<td>"; echo "<button >Modifier</button>"; echo "</td>";


// Conservation du traitement du pseudo
// (dans un tableau associatif dans cet exemple !)
$traite[$an["ani_id"]]=1;
echo "</tr>";
}
}

//FIN ELSE


 //FIN conditions affichant que les animation a venir
 //DEBUT conditions affichant que les animation courantes

//foreacht
}

}

/* ******************************************************debut ANIMATION courantes************************************************************************************************
 *************************************************************************************************************************************************************************** */

  foreach($ladate as $dat) {
    foreach($anim as $tea){
          if( $tea['ani_fin'] > $dat){
            echo "<tr style='background-color: yellow; '>";
echo "<td>"; echo "<th>"; echo "<center>";echo"Animations COURANTES"; echo "</center>";echo"</th>"; echo "</td>";
echo "</tr>";
//echo"<h1>";echo"ANIMATION PASSEES";echo"</h1>";
          }
          break;

    }


foreach($anim as $anid) {

  //conditions affichant que les animation a venir

//DEBUT ELIF
if ( $anid['ani_fin'] > $dat ) {

  // Affichage d’une ligne de tableau pour un pseudo non encore traité
if (!isset($traite[$anid["ani_id"]])){
$animaaa_id=$anid["ani_id"];


echo "<tr>";



echo "<td>";echo " <br>"; echo $anid["ani_libelle"];echo "</td>";
echo "<td>";
// Boucle d’affichage des actualités liées au pseudo

foreach($anim as $aniid){
echo "<ul>";
if(strcmp($animaaa_id,$aniid["ani_id"])==0 ){
    if ($aniid["ani_id"] != NULL){
        echo $aniid["ani_libelle"];

    }else{echo"Pas d'animation";}
echo "<li>";
echo $aniid["inv_nom"];
echo "  Participe à : ";
echo "<br />";
 echo $aniid["ani_libelle"];
 echo "<br />";
      if ($aniid["ani_debut"] != NULL) {
 echo "<li>";
 echo "  Début :  ";
echo $aniid["ani_debut"];
 echo "  Fin : ";
echo $aniid["ani_fin"];
echo "<br />";
  }else{echo"Pas d'horaire pour le moment";}
if ($aniid["inv_id"] != NULL) {
  echo "Invité de cette animation nom : ";
echo " ";
echo $aniid["inv_nom"];
echo "<br />";
echo "<br />";
echo " Biographie: ";
echo "  ";
echo $aniid["inv_biographie"];
echo "<br />";
echo "<br />";
echo " Discipline : ";
echo " ";
echo $aniid["inv_discipline"];
echo "<br />";
echo "<br />";
echo " Photo : ";
echo " ";
echo ("<img width='10%' src='https://obiwan2.univ-brest.fr/licence/lic71/v2/CodeIgniter/style/assets/img/invite/".$aniid['inv_photo']."' >");
echo "<br />";
echo "<br />";
echo " Debut de l'animation : ";
echo " ";
echo $aniid["ani_debut"];
echo "<br />";
echo "<br />";
echo " FIN : ";
echo " ";
echo $aniid["ani_fin"];
}
else{echo"Pas d'invité pour l'instant et donc pas de PROGRAMMATION!";};

echo "<br />";
echo " LIEU: ";
echo " ";
if ($aniid["lieu_nom"] != NULL) {
 echo $aniid["lieu_nom"];
}
else{echo "Pas de lieu pour l'instant";};

echo "<br />";
echo "<br />";
echo "<br />";
echo"<h3>";echo"Sur le même évènement : "; echo $aniid["ani_libelle"];echo"</h3>";
echo "<br />";
echo "<br />";
echo "<br />";
//

echo "</li>";


}
echo "</ul>";
}
echo "</td>";
//tableau debut
echo "<td>"; 
      if ($an["ani_debut"] != NULL) {

echo $an["ani_debut"];

  }else{echo"Pas d'horaire pour le moment";}
 echo "</td>";
 //tableau fin
 echo "<td>"; 
       if ($an["ani_fin"] != NULL) {


echo $an["ani_fin"];

  }else{echo"Pas d'horaire pour le moment";}
 echo "</td>";
 //tableau lieu
echo "<td>"; 
if ($an["lieu_nom"] != NULL) {
 echo $an["lieu_nom"];
}
else{echo "Pas de lieu pour l'instant";};
echo "</td>";
//tableau boutons

echo "<td>"; ?> <a class="nav-link" href="<?php echo base_url();?>index.php/compte/supprimer_animation_admin/<?php echo $an['ani_id'] ?>">
               Supprimer
                </a> 
                <?php echo "</td>";
echo "<td>"; echo "<button >Modifier</button>"; echo "</td>";

$traite[$anid["ani_id"]]=1;
echo "</tr>";
}
}

//FIN ELSE


 //FIN conditions affichant que les animation a venir
 //DEBUT conditions affichant que les animation courantes

//foreacht
}

}


/* ******************************************************PASSEES*************************************************************************
 *************************************************************************************************************************************************************************** */
  foreach($ladate as $da) {
    foreach($anim as $te){
          if( $te['ani_debut'] < $da){
            echo "<tr style='background-color:gray; '>";
echo "<td>"; echo "<th>"; echo "<center>";echo"Animations PASSEES"; echo "</center>";echo"</th>"; echo "</td>";
echo "</tr>";
//echo"<h1>";echo"ANIMATION PASSEES";echo"</h1>";
          }
          break;

    }

            echo "<tr style='background-color:gray; '>";
echo "<td>"; echo "<th>"; echo "<center>";echo"Animations PASSEES"; echo "</center>";echo"</th>"; echo "</td>";
echo "</tr>";
foreach($anim as $ani) {

  //conditions affichant que les animation a venir

//DEBUT ELIF
if ($ani['ani_debut'] < $da) {

  // Affichage d’une ligne de tableau pour un pseudo non encore traité
if (!isset($traite[$ani["ani_id"]])){
$animaa_id=$ani["ani_id"];


echo "<tr>";



echo "<td>";echo " <br>"; echo $ani["ani_libelle"];echo "</td>";
echo "<td>";
// Boucle d’affichage des actualités liées au pseudo

foreach($anim as $anii){
echo "<ul>";
if(strcmp($animaa_id,$anii["ani_id"])==0 ){

    if ($anii["ani_id"] != NULL){
        echo $anii["ani_libelle"];

    }else{echo"Pas d'animation";}

echo "<li>";
echo $anii["inv_nom"];
echo "  Participe à : ";
echo "<br />";
 echo $anii["ani_libelle"];
 echo "<br />";
      if ($anii["ani_debut"] != NULL) {
 echo "<li>";
 echo "  Début :  ";
echo $anii["ani_debut"];
 echo "  Fin : ";
echo $anii["ani_fin"];
echo "<br />";
  }else{echo"Pas d'horaire pour le moment";}
if ($anii["inv_id"] != NULL) {
  echo "Invité de cette animation nom : ";
echo " ";
echo $anii["inv_nom"];
echo "<br />";
echo "<br />";
echo " Biographie: ";
echo "  ";
echo $anii["inv_biographie"];
echo "<br />";
echo "<br />";
echo " Discipline : ";
echo " ";
echo $anii["inv_discipline"];
echo "<br />";
echo "<br />";
echo " Photo : ";
echo " ";
echo ("<img width='10%' src='https://obiwan2.univ-brest.fr/licence/lic71/v2/CodeIgniter/style/assets/img/invite/".$anii['inv_photo']."' >");
echo "<br />";
echo "<br />";
echo " Debut de l'animation : ";
echo " ";
echo $anii["ani_debut"];
echo "<br />";
echo "<br />";
echo " FIN : ";
echo " ";
echo $anii["ani_fin"];
}
else{echo"Pas d'invité pour l'instant et donc pas de PROGRAMMATION!";};

echo "<br />";
echo " LIEU: ";
echo " ";
if ($anii["lieu_nom"] != NULL) {
 echo $anii["lieu_nom"];
}
else{echo "Pas de lieu pour l'instant";};

echo "<br />";
echo "<br />";
echo "<br />";
echo"<h3>";echo"Sur le même évènement : "; echo $anii["ani_libelle"];echo"</h3>";
echo "<br />";
echo "<br />";
echo "<br />";
//

echo "</li>";


}
echo "</ul>";
}
echo "</td>";
//tableau debut
echo "<td>"; 
      if ($an["ani_debut"] != NULL) {

echo $an["ani_debut"];

  }else{echo"Pas d'horaire pour le moment";}
 echo "</td>";
 //tableau fin
 echo "<td>"; 
       if ($an["ani_fin"] != NULL) {


echo $an["ani_fin"];

  }else{echo"Pas d'horaire pour le moment";}
 echo "</td>";
 //tableau lieu
echo "<td>"; 
if ($an["lieu_nom"] != NULL) {
 echo $an["lieu_nom"];
}
else{echo "Pas de lieu pour l'instant";};
echo "</td>";
//tableau boutons


echo "<td>"; ?> <a class="nav-link" href="<?php echo base_url();?>index.php/compte/supprimer_animation_admin/<?php echo $an['ani_id'] ?>">
               Supprimer
                </a> 
                <?php echo "</td>";
echo "<td>"; echo "<button >Modifier</button>"; echo "</td>";
// Conservation du traitement du pseudo
// (dans un tableau associatif dans cet exemple !)
$traite[$ani["ani_id"]]=1;
echo "</tr>";
}
}

//FIN ELSE


 //FIN conditions affichant que les animation a venir
 //DEBUT conditions affichant que les animation courantes

//foreacht
}

}


















}
else {
echo "<br />";
echo "Aucune Animation !";
}
?>







 </tbody>
</table>
























































