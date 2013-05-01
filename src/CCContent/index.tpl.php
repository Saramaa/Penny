<h1>Content Controller</h1>
<p>Show posts and pages, init database and sample content, create new content or show blog</p>

<h2>All content</h2>
<?php if($contents != null):?>
 <ul>
  <?php foreach($contents as $val):?>
    <li><?=$val['id']?>, <?=esc($val['title'])?> by <?=$val['owner']?> <a href='<?=create_url("content/edit/{$val['id']}")?>'>edit</a> <a href='<?=create_url("page/view/{$val['id']}")?>'>view</a>
  <?php endforeach; ?>
  </ul>
<?php else:?>
  <p>No content exists.</p>
<?php endif;?>

<h2>Actions</h2>
<ul>
  <li><a href='<?=create_url('content/init')?>'>Init database, create tables and sample content</a>
  <li><a href='<?=create_url('content/create')?>'>Create new content</a>
  <li><a href='<?=create_url('blog')?>'>Show blog</a>
</ul>


