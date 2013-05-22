<h1>Admin Control Panel Index</h1>
<p>One controller to manage the admin related stuff. This far it should list all users and all groups
and enable to add, modify, delete users and add, modify, delete groups.</p>

<?php if($Admin): ?>
  
  <p>You were created at <?=$user['created']?> and last updated at <?=$user['updated']?>.</p>
  
  
  <p>There are <?=count($groups)?> group(s).</p>
  <ul>
  <?php foreach($groups as $group): ?>
    <li><?=$group['name']?>
  <?php endforeach; ?>
  </ul>

 
   <p>There are <?=count($users)?> user(s).</p>
  <ul>
  <?php foreach($users as $allusers): ?>
  
    <li><?=$allusers['name']?>, called <?=$allusers['acronym']?> 
   
  <?php endforeach; ?>
  </ul>
  <p>You can delete users by typing their acronym below. </br>
  You cannot delete yourself (root), the doe user or the anonomous user.</p>
 <form action="<?=$formAction?>" method='get'>
 <input type='text' value='' name= 'acronym' />
    <input type='submit' value='Delete user' name= 'Delete' />
</form>

 <form action="<?=$formAction2?>" method='get'>
 <input type='text' value='' name= 'name' />
    <input type='submit' value='Update user' name= 'Update' />
</form>

   <p>    <a href='user/create' title='Create a new user account'>Create new user</a>. You will be logged out as Administrator and inlogged as the new user.</p>
    <p>    <a href='user/profile' title='Update'>Update user account</a></p>
   
 
   
<?php else: ?>
  <p>User is anonymous and not authenticated.</p>
<?php endif; ?>

