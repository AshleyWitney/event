<?php echo form_open('compte_i');
 ?>

<?php
echo validation_errors();
$this->form_validation->set_rules('text1', 'text1', 'required' , array('required'=>
'Identifiant vide!'));
$this->form_validation->set_rules('text2', 'text2', 'required' , array('required'=>
'Zone de text vide!'));

 ?>




 <label for="mdp">Identifiant</label>
 <input type="text" name="text1" /><br />
<div class="form-group shadow-textarea">
  <label for="exampleFormControlTextarea6">Ajoutez un post </label>
  <textarea name="text2" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
   <input type="submit" name="submit" value="Valider" />
 <a href="https://obiwan2.univ-brest.fr/licence/lic71/v2/CodeIgniter/index.php/compte/accueil">Annuler</a> 
</div>
</form>