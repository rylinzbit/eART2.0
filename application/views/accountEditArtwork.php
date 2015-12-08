<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<title>Edit Artwork</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/artist_edit_artwork_styles.css">
</head>
<body>
	<div id="container">
		<div id="artwork"xs>
			<img src="/assets/img/<?= $art['image_name'] ?>">
		</div>
		<div>
			<form action="/artistAccountController/save_changes" method="POST">	
				<label>Title:</label>
					<input class=" form-control info" type="text" name="title" placeholder="<?= $art['title']?>">
				<label>Terms:</label>
					<select class="form-control info" name="terms">
						<option value="Term A">Term A</option>
						<option value="Term B">Term B</option>
						<option value="Term C">Term C</option>
						<option value="Term D">Term D</option>
						<option value="Term E">Term E</option>
					</select>
				<label>Price:</label>
					<input class="form-control info" type="number" step="any" name="price" placeholder="<?= $art['price']?>">
				<label>Description:</label>
					<textarea class="form-control info" rows="5" name="description"><?= $art['about']?></textarea>
				<input type="hidden" name="artwork_id" value="<?= $art['id'] ?>">
				<button class="btn btn-default button" type="submit">Save Changes</button>
			</form>
		</div>
	</div>
</body>
</html>