



    <!-- Debut présentation de l'évènement  -->
    <section id="event-slides" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Les 72h africaines</h1>
              <p class="wow fadeInDown" data-wow-delay="0.2s">A PROPOS DE L'EVENEMENT </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
            <div class="video">
              <img class="img-fluid" src="assets/img/about/about.jpg" alt="">
              <img height="600px" src="<?php echo base_url();?>style/assets/img/invite/miss.jpg">
              <p>AVEC Miss Côte d’Ivoire Olivia Yacé !</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.3s">

            <p class="intro-desc">

              Les 72 heures africaines ont pour but de vous faire vivre une expérience unique, de nombreux artistes et personalités y seront
              pour votre plus grand plaisir. 
              Cet évènement culturelle et bien ambiancé vous permettra de réaliser des activités avec vos artiste préférés, de vous ressourcer d'apprendre de nouvelles choses et bien encore!
              Il s'agit de l'évènement de l'année ! venez découvrir et vivre une expérience unique!
            </p>
            <h2 class="intro-title">Une idée du programme ?</h2>

            <ul class="list-specification">
              <li><i class="lni-check-mark-circle"></i> Chansons en duo avec votre star préféré</li>
              <li><i class="lni-check-mark-circle"></i>Atelier de cuisine avec les plus grand chef et aussi avec les artistes qui voudront y participer</li>
              <li><i class="lni-check-mark-circle"></i>Découverte des masques </li>
              <li><i class="lni-check-mark-circle"></i>Histoire et légende et bien d'autres!</li> 
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- Fin de la présentation de l'évènement -->


    <!-- Début Tableau des actualités   -->
 <!-- debut Gros titre actualite   -->
        <section id="event-slides" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Les actualités !</h1>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
            <div class="video">
              <img class="img-fluid" src="assets/img/about/about.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
     <!-- fin Gros titre actualite   -->
<br />
<?php
if($actu != NULL) {


?>

<table class="table table-striped ">
   

  <thead>
    <tr bgcolor=#e91e63>
      <th scope="col">Titre</th>
      <th scope="col">Texte</th>
      <th scope="col">Date de publication</th>
      <th scope="col">Organisateurs</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($actu as $a){?>
    <tr>
      <td><?php echo $a["act_titre"]; ?></td>
      <td><?php echo $a["act_contenu"]; ?></td>
      <td><?php echo $a["act_date"]; ?></td>
      <td><?php echo $a["org_nom"]; ?></td>
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

 <!-- Début Tableau des actualités   -->

 