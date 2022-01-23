

<?php
if($_SESSION['statut']!= 'O'){
redirect(base_url()."index.php/compte/connecter");
}
else {
// ...
}

?>
<h3>Espace Administrateur</h3>
<br />

<?php

//echo $this->session->userdata('statut');

echo"<h2>"; echo"Profil de : ";echo $_SESSION['username']; echo"</h2>";

//echo $this->session->userdata('username');

?> 


<?php echo form_open('compte_amdp'); ?>
<?php
echo validation_errors();
$this->form_validation->set_rules('mdp', 'mdp', 'required' , array('required'=>
'champs mot de passe vide!'));
$this->form_validation->set_rules('mdp2', 'mdp2', 'required' , array('required'=>
'champs confirmation mot de passe vide!'));

 ?>
<label ><?php echo $_SESSION['username']; ?></label> 
 <br>
 <label for="mdp">Mot de passe</label>
 <input type="password" name="mdp" /><br />
  <label for="mdp">Confirnez Mot de passe</label>
 <input type="password" name="mdp2" /><br />
 <input type="submit" name="submit" value="Valider" />
 <a href="https://obiwan2.univ-brest.fr/licence/lic71/v2/CodeIgniter/index.php/compte/profil_admin">Annuler</a> 
</form>