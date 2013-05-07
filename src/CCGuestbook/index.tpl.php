<h1>Annas g&auml;stbok</h1>
<p>Skriv en rad eller tv&aring; :)</p>

<form action="<?=$formAction?>" method='post'>
  <p>
    <label>Skriv h&auml;r: <br/>
    <textarea name='newEntry'></textarea></label>
  </p>
  <p>
    <input type='submit' name='doAdd' value='Publicera' />
   <!-- <input type='submit' name='doClear' value='Radera alla meddelanden' />-->
    <!--<input type='submit' name='doCreate' value='Skapa databastabell' />-->
  </p>
</form>

<h2>Skrivna meddelanden:</h2>

<?php foreach($entries as $val):?>
<div style='background-color:#f6f6f6;border:1px solid #ccc;margin-bottom:1em;padding:1em;'>
  <p>Skrivet: <?=$val['created']?></p>
  <p><?=htmlent($val['entry'])?></p>
</div>
<?php endforeach;
 ?>
