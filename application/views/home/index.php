<div class="container">
<div class="row">
	<div class="span12">
	
	<?php foreach ( $posts as $post ) : ?>
	<h1><?php echo $post['title']; ?></h1>
	<?php echo $post['content']; ?>
	<?php endforeach; ?>	
	</div>
</div>
</div>
