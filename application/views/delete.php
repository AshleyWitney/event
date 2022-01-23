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
echo"supprimé";