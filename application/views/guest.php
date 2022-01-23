   <!-- GALERIE -->

    <section id="event-slides" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">ANIMATION PAR INVITES</h1>
              <p class="wow fadeInDown" data-wow-delay="0.2s">Ils participent à : </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
            <div class="video">
              <img class="img-fluid" src="assets/img/about/about.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.3s">
            <p class="intro-desc">

              Les 48 heures africaines ont pour but de vous faire vivre une expérience unique, de nombreux artistes et personalités y seront
              pour votre plus grand plaisir. 
             Les ivités et leurs animations vous sont présenté!
            </p>
            <h2 class="intro-title">Une idée du programme ?</h2>
            <ul class="list-specification">
              <li><i class="lni-check-mark-circle"></i> Chansons en duo avec votre star préféré</li>
              <li><i class="lni-check-mark-circle"></i>Atelier de cuisine avec les plus grand chef et aussi avec les artistes qui voudront y participer</li>
              <li><i class="lni-check-mark-circle"></i>Découverte des masques </li>
              <li><i class="lni-check-mark-circle"></i>Histoire et légende</li> 
            </ul>
          </div>
        </div>
      </div>
   
</section>



<section>
//ANIMATION ET INVITES

<?php
if ($guest != NULL){
?>
<table class="table table-bordered">
 <thead>
 <tr>
 <th>Invité(s)</th>
 <th>Animation(s)</th>

 </tr>
 </thead>
 <tbody>

<?php
// Boucle de parcours de toutes les lignes du résultat obtenu
foreach($guest as $g){
// Affichage d’une ligne de tableau pour un pseudo non encore traité
if (!isset($traite[$g["inv_id"]])){
$animation_id=$g["inv_id"];
echo "<tr>";
echo "<td>"; if ($g["inv_nom"] != NULL) {
  echo $g["inv_nom"]; echo "<br />";    echo ("<img width='50%' src='https://obiwan2.univ-brest.fr/licence/lic71/v2/CodeIgniter/style/assets/img/invite/".$g['inv_photo']."' >");
} else {echo "PAS D'INVITES POUR LE MOMENT";};echo "</td>";
echo "<td>";
?>
    <section id="schedules" class="schedule section-padding">
<table class="table table-striped">

  <tbody>

  
    <tr>
    
      <td>
        <?php
        echo "<ul>";
        foreach($guest as $gu){ 
if(strcmp($animation_id,$gu["inv_id"])==0){

echo "<li>";
echo $gu["inv_nom"];
echo "  Participe à : ";
echo "<br />";
if ($gu["ani_id"] != NULL) {
  echo "INTITULE ANIMATION : ";
echo " ";
echo $gu["ani_libelle"];
echo "<br />";
echo " DESCRIPTION : ";
echo "  ";
echo $gu["ani_description"];
echo "<br />";
echo " DEBUT : ";
echo " ";
echo $gu["ani_debut"];
echo "<br />";
echo " FIN : ";
echo " ";
echo $gu["ani_fin"];
}
else{echo"Pas d'animation pour l'instant'";};

echo "<br />";
echo " LIEU: ";
echo " ";
if ($gu["lieu_nom"] != NULL) {
 echo $gu["lieu_nom"];
}
else{echo "Pas de lieu pour l'instant";};

echo " ********** ";
echo "<br />";
echo "Voir plus : ";
echo "<br />";
echo "<br />";
echo "<br />";
echo $gu["inv_nom"];
echo "  Participe aussi à : ";
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
$traite[$g["inv_id"]]=1;
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







 </section>