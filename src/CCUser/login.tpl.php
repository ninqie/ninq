<h1>User Login</h1>
<p>Pretend there's a form here. Use links. Use your imagination. BUT THAT'S OLD NEWS! </p>

<?=$login_form->GetHTML(array('start' => true))?>
  <fieldset>
    <?=$login_form['acronym']->GetHTML()?>
    <?=$login_form['password']->GetHTML()?> 
    <?=$login_form['login']->GetHTML()?>
    <?php if($allow_create_user) : ?>
      <p class='form-action-link'><a href='<?=$create_user_url?>' title='Create a new user account'>Create user</a></p>
    <?php endif; ?>
  </fieldset>
</form>
