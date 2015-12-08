<?php

?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://checkout.stripe.com/checkout.js"></script>
<?php
	$this->load->view("partials/toolbar.php");
?>
		<div class="row">
			<div class="col-md-3"></div>
			<img class="col-md-6" src="/assets/img/twins.jpg" width="300px" height="180px" alt="whoops">
			<div class="col-md-3"></div>
		</div>
		<div class="row" style=" padding: 15px 0 0 0;">
			<div class="col-md-5"></div>
			<button class="col-md-2" id="customButton">Purchase</button>
			<div class="col-md-5"></div>
		</div>

		<script>
		  var handler = StripeCheckout.configure({
		    key: 'pk_test_nh5NXAcoLYFKoZXLh8sopaH6',
		    image: '/assets/img/Art.jpeg',
		    locale: 'auto',
		    token: function(token) {
		      // Use the token to create the charge with a server-side script.
		      // You can access the token ID with `token.id`
		    }
		  });

		  $('#customButton').on('click', function(e) {
		    handler.open({
		      name: 'eART',
		      description: '2 widgets',
		      amount: 1000
		    });
		    e.preventDefault();
		  });


		  $(window).on('popstate', function() {
		    handler.close();
		  });
</script>