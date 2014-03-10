<?php if($content['id']):?>
  <h1><?=esc($content['title'])?></h1>
<p><?=filter_data($content['data'], $content['filter'])?></p>
<p class='smaller-text silent'><a href='<?=create_url("content/edit/{$content['id']}")?>'>edit</a> <a href='<?=create_url("content")?>'>view all</a></p>
<?php else:?>
  <p>404: No such page exists.</p>
<?php endif;?>


