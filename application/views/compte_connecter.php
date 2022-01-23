
<?php echo validation_errors(); ?>
<?php echo form_open('compte/connecter'); //'message_erreur'
$this->form_validation->set_rules('pseudo', 'pseudo', 'required' , array('required'=>
'Veuillez saisir identifiant !'));
$this->form_validation->set_rules('mdp', 'mdp', 'required' , array('required'=>
'Veuillez saisir le mot de passe !'));
/*
$this->form_validation->set_rules('pseudo', 'pseudo', 'required' , array('required'=>
'Veuillez saisir identifiant !'));
$this->form_validation->set_rules('mdp', 'mdp', 'required' , array('required'=>
'Veuillez saisir le mot de passe !'));
*/
?>
<label>Saisissez vos identifiants ici :</label><br>
<input type="text" name="pseudo" placeholder="Identifiant" />
<input type="password"  name="mdp" placeholder="Mot de passe" />

<input type="submit" value="Connexion"/>
</form>