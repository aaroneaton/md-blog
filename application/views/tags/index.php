<div class="container">
<div class="row">
	<div class="span12">
	
	<?php foreach ( $posts as $post ) : ?>
  <h1><?php echo anchor( $post['file'], $post['title'] ); ?></h1>
  <h6><?php echo $post['date']; ?></h6>
	<?php echo $post['content']; ?>
<h6>Tags: </h6>
  <p><?php foreach ( $post['tags'] as $tag ) : ?>
  
<?php echo anchor( 'tag/' . $tag, $tag ) . ' '; ?>
  
<?php endforeach; ?>
  </p>
<hr />
	<?php endforeach; ?>	
	</div>
</div>
</div>
