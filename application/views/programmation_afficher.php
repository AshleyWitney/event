<br />
<?php
if(isset($ladate)) {
//$_GET['variable']
//echo "okayyyy";


}
else {echo "<br />";
echo "pas d’actualité !";
}
?>


<?php
//echo $ladate;
if ($anim != NULL and $ladate !=NULL){
?>

<table class="table table-bordered" class="table table-striped">
 <thead>

 <tr  >
 <th>Animations(s)</th>
 <th><center>Programmation</center></th>
  <th><center>Début</center></th>
   <th><center>Fin</center></th>
 <th>Détails</th>
 <th>Galérie</th>
  <th>Lieux</th>
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

echo "<td>"; 
      if ($t["ani_id"] != NULL) {


echo "<th >"; echo "<center>";echo"Animations A VENIR"; echo "</center>";echo"</th>";


  }else{echo"Pas d'animation";}
 echo "</td>";


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
          echo "<br />";
echo "<br />";
        echo $ani["ani_libelle"];

    
echo "<li>";
echo"<hr>";
echo"<h5>";echo"Sur l'évènement  : "; echo $ani["ani_libelle"];echo"</h5>";
echo"<hr>";
echo $ani["inv_nom"];
echo "  Participe à :  ";

 echo $ani["ani_libelle"];
 echo "<br />";
if ($ani["inv_id"] != NULL) {
  echo "Invité de cette animation  : ";
    echo "<br />";
echo "<br />";
echo "Nom :  ";
echo $ani["inv_nom"];
    echo "<br />";
echo "<br />";
echo "Prénom : ";
echo $ani["inv_prenom"];
echo "<br />";
echo "<br />";
echo "Biographie :   ";
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

}
else{echo"Pas d'invité pour l'instant";};

echo "<br />";
echo " LIEU: ";
echo " ";
if ($ani["lieu_nom"] != NULL) {
 echo $ani["lieu_nom"];
}
else{echo "Pas de lieu pour l'instant";};


//

echo "</li>";

}else{echo"Pas d'animation";}
}
/////////////
echo "</ul>";
}

echo "</td>";
echo "<td>"; 
      if ($an["ani_debut"] != NULL) {


echo $an["ani_debut"];


  }else{echo"Pas d'horaire de debut pour le moment";}
 echo "</td>";
echo "<td>"; 
      if ($an["ani_fin"] != NULL) {


echo $an["ani_fin"];


  }else{echo"Pas d'horaire de fin pour le moment";}
echo "</td>";
echo "<td>"; ?> <a class="nav-link" href="<?php echo base_url();?>index.php/animation/touteanidetail/<?php echo $an['ani_id'] ?>">
                Détail
                </a> 
                <?php echo "</td>";
echo "<td>"; ?> <a class="nav-link" href="<?php echo base_url();?>index.php/animation/touteinvdetail/<?php echo $an['ani_id'] ?>">
                  Détails invité
                </a> 
                <?php echo "</td>";

              echo "<td>"; ?> <a class="nav-link" href="<?php echo base_url();?>index.php/animation/lieudetail/<?php echo $an['ani_id'] ?>">
                  Lieux et services
                </a> 
                <?php echo "</td>";

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

echo "<td>"; 
      if ($tea["ani_id"] != NULL) {


echo "<th >"; echo "<center>";echo"Animations COURANTE"; echo "</center>";echo"</th>";


  }else{echo"Pas d'animation";}
 echo "</td>";


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
          echo "<br />";
echo "<br />";
        echo $aniid["ani_libelle"];

  
echo "<li>";
echo"<hr>";
echo"<h5>";echo"Sur l'évènement : "; echo $aniid["ani_libelle"];echo"</h5>";
echo"<hr>";
echo $aniid["inv_nom"];
echo "  Participe à :  ";

 echo $aniid["ani_libelle"];
 echo "<br />";
if ($aniid["inv_id"] != NULL) {
  echo "Invité de cette animation  : ";
    echo "<br />";
echo "<br />";
echo "Nom :  ";
echo $aniid["inv_nom"];
    echo "<br />";
echo "<br />";
echo "Prénom :  ";
echo $aniid["inv_prenom"];
echo "<br />";
echo "<br />";
echo " Biographie: ";
echo "  ";echo "  ";
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

}
else{echo"Pas d'invité pour l'instant";};

echo "<br />";
echo " LIEU: ";
echo " ";
if ($aniid["lieu_nom"] != NULL) {
 echo $aniid["lieu_nom"];
}
else{echo "Pas de lieu pour l'instant";};

//

echo "</li>";
}else{echo"Pas d'animation";}

}
echo "</ul>";
}
echo "</td>";
echo "<td>"; 
      if ($anid["ani_debut"] != NULL) {


echo $anid["ani_debut"];


  }else{echo"Pas d'horaire de debut pour le moment";}
 echo "</td>";
echo "<td>"; 
      if ($anid["ani_fin"] != NULL) {


echo $anid["ani_fin"];


  }else{echo"Pas d'horaire de fin pour le moment";}
echo "</td>";
echo "<td>"; ?> <a class="nav-link" href="<?php echo base_url();?>index.php/animation/touteanidetail/<?php echo $anid['ani_id'] ?>">
                Détail
                </a> 
                <?php echo "</td>";
echo "<td>"; ?> <a class="nav-link" href="<?php echo base_url();?>index.php/animation/touteinvdetail/<?php echo $anid['ani_id'] ?>">
                  Détails invité
                </a> 
                <?php echo "</td>";

              echo "<td>"; ?> <a class="nav-link" href="<?php echo base_url();?>index.php/animation/lieudetail/<?php echo $anid['ani_id'] ?>">
                  Lieux et services
                </a> 
                <?php echo "</td>";

// Conservation du traitement du pseudo
// (dans un tableau associatif dans cet exemple !)
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
             echo "<tr style='background-color: gray; '>";

echo "<td>"; 
      if ($te["ani_id"] != NULL) {


echo "<th >"; echo "<center>";echo"Animations PASSEES"; echo "</center>";echo"</th>";


  }else{echo"Pas d'animation";}
 echo "</td>";


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
          echo "<br />";
echo "<br />";
        echo $anii["ani_libelle"];

    

echo "<li>";
echo"<hr>";

echo"<h5>";echo"Sur l'évènement : "; echo $anii["ani_libelle"];echo"</h5>";
echo"<hr>";
echo $anii["inv_nom"];
echo "  Participe à :  ";

 echo $anii["ani_libelle"];
 echo "<br />";
if ($anii["inv_id"] != NULL) {

  echo "Invité de cette animation  : ";
    echo "<br />";
echo "<br />";
echo "Nom :  ";
echo $anii["inv_nom"];
    echo "<br />";
echo "<br />";
echo "Prénom :  ";
echo $anii["inv_prenom"];
echo "<br />";
echo "<br />";
echo " Biographie: ";
echo "  ";echo "  ";
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

}
else{echo"Pas d'invité pour l'instant";};

echo "<br />";
echo " LIEU: ";
echo " ";
if ($anii["lieu_nom"] != NULL) {
 echo $anii["lieu_nom"];
}
else{echo "Pas de lieu pour l'instant";};


//

echo "</li>";
}else{echo"Pas d'animation";}

}
echo "</ul>";
}
echo "</td>";

echo "<td>"; 
      if ($ani["ani_debut"] != NULL) {


echo $ani["ani_debut"];


  }else{echo"Pas d'horaire de debut pour le moment";}
 echo "</td>";
echo "<td>"; 
      if ($ani["ani_fin"] != NULL) {


echo $ani["ani_fin"];


  }else{echo"Pas d'horaire de fin pour le moment";}
echo "</td>";
echo "<td>"; ?> <a class="nav-link" href="<?php echo base_url();?>index.php/animation/touteanidetail/<?php echo $ani['ani_id'] ?>">
                Détail
                </a> 
                <?php echo "</td>";
echo "<td>"; ?> <a class="nav-link" href="<?php echo base_url();?>index.php/animation/touteinvdetail/<?php echo $ani['ani_id'] ?>">
                  Détails invité
                </a> 
                <?php echo "</td>";

              echo "<td>"; ?> <a class="nav-link" href="<?php echo base_url();?>index.php/animation/lieudetail/<?php echo $ani['ani_id'] ?>">
                  Lieux et services
                </a> 
                <?php echo "</td>";

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
echo "Aucune animation!";
}
?>







 </tbody>
</table>
























































