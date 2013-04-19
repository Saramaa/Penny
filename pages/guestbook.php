<?php
/**
 * My own me-page to start with.
 */
include("../site/config.php");
// Create the data array which is to be used in the template file.
$data['title'] = "Anna Dahlgren - Redovisning";
?>
<h1>Guestbook</h1>
<p>Showing off how to implement a guestbook. Now saving to database.</p>

<form action="<?=$form_action?>" method='post'>
  	<p>
    	<label>Name: <br/>
    	<input type="text" name="name"></label>
    	<br/><br/><label>Message: <br/>
    	<textarea name='message'></textarea></label>
  	</p>
  	<p>
    	<input type='submit' name='doAdd' value='Add message' />
    	<input type='submit' name='doClear' value='Clear all messages' />
    	<input type='submit' name='doCreate' value='Create database table' />
	</p>
</form>


<h2>Current messages</h2>

<?php 
if (is_array($entries)) {
	foreach($entries as $val):?>
	<div style='background-color:#f6f6f6;border:1px solid #ccc;margin-bottom:1em;padding:1em;'>
	  <p>[<?=$val['created']?>] <b><?=$val['name']?>:</b></p>
	  <p><?=$val['entry']?></p>
	</div>
<?php endforeach;}


