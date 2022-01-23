
     <section >

  <div class="container-fluid">
    <div class="px-lg-5">

    <!-- End -->

    <div class="row">

      <!-- Gallery item -->
      <?php

if ($guest != NULL){
?>

<?php
// Boucle de parcours de toutes les lignes du résultat obtenu

foreach($poste as $pos){
if ($pos['inv_id'] != NULL) {


if (!isset($traite[$pos["inv_id"]])){
$invite_id=$pos["inv_id"];
// Affichage d’une ligne de tableau pour un pseudo non encore traité
  ?>
  <!-- Gallery item -->
      <div class="col-xl-3 col-lg-4 col-md-6 mb-4" >

        <div class="bg-white rounded shadow-sm"> <?php echo"<center>";echo ("<img width='50%' src='https://obiwan2.univ-brest.fr/licence/lic71/v2/CodeIgniter/style/assets/img/invite/".$pos['inv_photo']."' >");  echo"</center>";?>
          <div class="p-4">
            <h5> <a href="#" class="text-dark"> <?php echo $pos["inv_nom"]; ?> </a></h5>
            
            <p class="small text-muted mb-0">

              <h5> <a href="#" class="text-dark"> 
                <?php
                if ($poste["url_nom"] = NULL) {
                echo "  pas de lien";
                }
                else{
           foreach($url as $ur){
            if(strcmp($invite_id,$ur['inv_id']) ==0)
{echo'  <a href=" ';  echo $ur["url_nom"]; echo' " > Lien</a>';}
           }
      }
               
              // echo ("<img width='50%' src='https://obiwan2.univ-brest.fr/licence/lic71/dev/CodeIgniter/style/assets/img/invite/youtube.png"); 


                
              //  else{echo "Pas d'url pour l'instant !: ";};
                 
                  ?> 

            </a></h5>
  
<h1><?php echo $pos["inv_nom"]; echo "Derniers postes !: "; echo "<br> ";  echo "<br> ";?></h1>
              <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Pseudo membre : </th>
      <th scope="col">" Postes :</th>
      <th scope="col">Date du poste : </th>
    </tr>
  </thead>
  <tbody>
                                <?php
            
// Boucle d’affichage des actualités liées au pseudo
foreach($poste as $p){

if(strcmp($invite_id,$p["inv_id"])==0){

?>
    <tr>
      
      <td>
        <?php
        if ($p["pas_id"] != NULL and $p["pos_etat"] != 'C') {
  echo $p["pas_id"];
}
else{echo "Pas de membre de staff pour l'instant";};
?>
      </td>
      <td>
        <?php
        if ($p["pos_texte"] != NULL and $p["pos_etat"] != 'C') {
  echo $p["pos_texte"];
}
else{echo "Pas de poste pour l'instant";};
?>
      </td>

      <td>
        <?php
        if ($p["pos_date"] != NULL and $p["pos_etat"] != 'C') {
 echo $p["pos_date"];
}
else{echo "Pas de date pour l'instant";};
?>
      </td>

   
</tr>
<?php
// Conservation du traitement du pseudo
// (dans un tableau associatif dans cet exemple !)
$traite[$pos["inv_id"]]=1;
}
}


?>
  </tbody>
</table>





            </p>

        </div>
      </div>
      <!-- End -->


      <!-- End -->

      <!-- End -->

 
      <!-- End -->


      <!-- End -->

    </div>
    <?php
  }
}

}

}
else{echo"pas d' invites !!!!!";}



?>

  </div>
</div>
</div>
</section>