<h1>Login</h1>
<p>Login using your acronym or email.</p>
<?=$login_form->GetHTML(array('start'=>true))?>
  <fieldset>
    <?=$login_form['acronym']->GetHTML()?>
    <?=$login_form['password']->GetHTML()?>  
    <?=$login_form['login']->GetHTML()?></br>
    <?php if($allow_create_user) : ?>
      <a href='<?=$create_user_url?>' title='Create a new user account'>Create user</a></p>
    <?php endif; ?>
  </fieldset>
</form>

