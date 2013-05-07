<h1>Blogg</h1>

<p><a href='<?=create_url("content/create")?>'>Skriv nytt inl&auml;gg</a>.
<?php if($contents != null):?>
  <?php foreach($contents as $val):?>
    <h2><?=esc($val['title'])?></h2>
    <p class='smaller-text'><em>Posted on <?=$val['created']?> by <?=$val['owner']?></em></p>
    <p><?=filter_data($val['data'], $val['filter'])?></p>
  <!--  <p class='smaller-text silent'><a href='<?=create_url("content/edit/{$val['id']}")?>'>edit</a></p>-->
  <?php endforeach; ?>
<?php else:?>
  <p>No posts exists.</p>
<?php endif;?>

<!--<p>Blogginl&auml;gg taggade med "post"</p>-->

<!-- <a href='<?=create_url("content")?>'>Lista alla inl&auml;gg och sidor</a>.-->

