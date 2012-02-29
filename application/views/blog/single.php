<div class="container">
<div class="row">
	<div class="span12">
  <h1><?php echo $post['title']; ?></h1>
  <h6><?php echo $post['date']; ?></h6>
    <div class="post-content">
<?php echo $post['content']; ?>
    </div>
    <h6>Tags:</h6>
<p>
<?php foreach ($post['tags'] as $tag ) : ?>
<?php echo anchor( 'tag/' . $tag, $tag . ' ' ); ?>
<?php endforeach; ?>
</p>
	</div>
</div>
</div>
