<?php echo form_open('compte_spost');
 ?>

<?php
echo validation_errors();
$this->form_validation->set_rules('text1', 'text1', 'required' , array('required'=>
'Identifiant vide!'));
$this->form_validation->set_rules('text2', 'text2', 'required' , array('required'=>
'Zone de text vide!'));
$this->form_validation->set_rules('mdp', 'mdp', 'required' , array('required'=>
'champs mot de passe vide!'));
//$this->form_validation->set_rules('text2', 'text2', 'max_length[2]' , array('required'=>
//'Un post a 140 caractères maximum!'));



 ?>




 <label for="mdp">Identifiant</label>
 <input type="text" name="text1" /><br />
  <label for="mdp">Mot de passe</label>
 <input type="password" name="mdp" /><br />
<div class="form-group shadow-textarea">
  <label for="exampleFormControlTextarea6">Ajoutez un post </label>
  
  <textarea name="text2" class="form-control z-depth-1" maxlength="140" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
   <input type="submit" name="submit" value="Valider" />
 <a href="https://obiwan2.univ-brest.fr/licence/lic71/v2/CodeIgniter/index.php/accueil/afficher">Annuler</a> 
</div>
</form>