<h1>Install all modules</h1>

<p>Penny is built by modules and each module has a installation phase which usually means creating the database tables and a directory in the <code>site/data</code> area.</p>

<table>
<caption><?=t('Results from each module affected.')?></caption>
<thead>
  <tr><th><?=t('Module')?></th><th><?=t('Result')?></th></tr>
</thead>
<tbody>
<?php $output = null; ?>
<?php foreach($modules as $module): ?>
  <tr><td><?=esc($module['name'])?></td><td><div class='<?=$module['result'][0]?>'><?=esc($module['result'][1])?></div></td></tr>
<?php endforeach; ?>
</tbody>
</table>


<p>
<a href='<?=create_url(null, 'step3')?>'>&laquo; Back</a>&nbsp;&nbsp;&nbsp;
<a href='<?=create_url(null, 'step4')?>'>Reload and check again</a>&nbsp;&nbsp;&nbsp;
<a href='<?=create_url(null, 'step5')?>'>Continue &raquo;</a>
</p>
