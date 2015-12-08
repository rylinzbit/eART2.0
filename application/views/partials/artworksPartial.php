<?php
	foreach($artworks as $artwork) {
?>
	<div class="artBox">
		<img class="artImg col-md-12" id="<?= $artwork['id'] ?>" src="/assets/img/<?= $artwork['image_name'] ?>" alt="<?= $artwork['image_name'] ?>">
	</div>
<?php
	}
?>