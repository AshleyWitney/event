
<?php
if($listeu != NULL) {
foreach($listeu as $nbuser){
 echo "<br />";
 echo " -- ";
echo $nbuser;
echo " -- ";
echo "<br />";
}
}
else {echo "<br />";
echo "Aucun user !";
}
?>


<h1><?php echo $titre;?></h1>
<br />
<?php
if($pseudos != NULL) {
foreach($pseudos as $login){
 echo "<br />";
 echo " -- ";
echo $login["cpt_pseudo"];
echo " -- ";
echo "<br />";
}
}
else {echo "<br />";
echo "Aucun compte !";
}
?>

