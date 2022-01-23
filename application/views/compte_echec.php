
<?php
if($_SESSION['statut']!= 'I'){
redirect(base_url()."index.php/compte/connecter");
}
else {
// ...
}

?>
<h2>Espace d'invité</h2>
<br />

<?php

//echo $this->session->userdata('statut');

echo $_SESSION['username'];

echo $_SESSION['statut'];
//echo $this->session->userdata('username');
 redirect('https://obiwan2.univ-brest.fr/licence/lic71/v2/CodeIgniter/index.php/compte/connecter');
echo"Identifiants erronés ou inexistants !";


?> 

