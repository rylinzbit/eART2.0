<?php
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/test.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<title>Artwork</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/landing.css">

	<script type="text/javascript">
		$(document).ready(function() {
			$('#moreArtist').click(function() {
				window.location.href='/profileController/artist_show_info/'+<?= $artist['id'] ?>;
			 });

			$.get('/mainController/artwork_html', function(res) {
				$('#suggested').html(res);
			}); //ends .get('quotes/...

			$(document).on("click", ".artImg", function() {
			    var img_data = $(this).attr('id');
				window.location.href='/artworkController/artwork_show_info/' + img_data;
			 });

			return false;
		})	
	</script>
</head>
<body>
	<div class="artwork_container">
<?php
		$this->load->view("partials/toolbar.php");
?>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-8"><h2><?= $artwork['title'] ?></h2></div>
			<!-- <div class="col-md-3"><button class="btn color" formaction="main">Back</button></div> -->
			<div class="col-md-3"><a href="javascript:go(-1)" class="btn color" onClick="history.back()">Back</a></div>
		</div>

		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10"><img id="ironman" src="/assets/img/<?= $artwork['image_name'] ?>"></div>
			<div class="col-md-1"></div>
		</div>

		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div class="btn-group">
  					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   						Options <span class="caret"></span>
  						</button>
  					<ul class="dropdown-menu">
  				  	 	<li><a href="#">CGI </a></li>
    					<li><a href="#">Prints</a></li>
    					<li><a href="#">Background</a></li>
    					<li><a href="#">Separated link</a></li>
  					</ul>
				</div>
			</div>
			<div id="price" class="col-md-2">$<?= $artwork['price'] ?></div>
			<div class="col-md-5"></div>
			<div  class="col-md-1"><button id="cart" class="btn color">Add to Cart</button></div>
		</div>	
		
		<div class="row">
			<div class="col-md-1"></div>
			<div id="about_artist" class="col-md-3">
				<h3>About <?= $artist['first_name'].' '.$artist['last_name'] ?></h3>
				<p><?= $artist['bio'] ?></p>
				<button id="moreArtist">More about <?= $artist['first_name'].' '.$artist['last_name'] ?></button>
			</div>
			<div class="col-md-3">
				<div id="description">
					<h3>About <?= $artwork['title'] ?></h3>
					<p><?= $artwork['about'] ?></p>
				</div>
			</div>

			<div class="col-md-5">
				<div id="suggested">
				</div>
			</div>
		</div>

		<div class="row">

		</div>
	
	</div>			
</body>
</html>