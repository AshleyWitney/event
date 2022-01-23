

    <section id="event-slides" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">La galerie</h1>
              <p class="wow fadeInDown" data-wow-delay="0.2s">Galerie des invités </p>
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
              Cet évènement vous permettra de réaliser des activités avec vos artiste préférés, de vous ressourcer d'apprendre de nouvelles choses et bien encore!
              Il s'agit de l'évènement de l'année ! venez découvrir et vivre une expérience unique!
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


</section>












