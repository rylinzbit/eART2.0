<html>
<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script text="text/javascript">

		  Stripe.setPublishableKey('pk_test_nh5NXAcoLYFKoZXLh8sopaH6');

		$(document).ready(function(e) {

		    $('#payment-form').submit(function(event) {
		    var $form = $(this);

		    $form.find('button').prop('disabled', true);

		    Stripe.card.createToken($form, stripeResponseHandler);

		    return false;
	    });
		    function stripeResponseHandler(status, response) {
		  	var $form = $('#payment-form');

			  if (response.error) {

			    $form.find('.payment-errors').text(response.error.message);
			    $form.find('button').prop('disabled', false);
			  } else {

			    var token = response.id;

			    $form.append($('<input type="hidden" name="stripeToken" />').val(token));

			    $form.get(0).submit();
			  }
			};
		});
	</script>
<?php
	$this->load->view("partials/toolbar.php");
?>
	<title>Stripe Check Out</title>
</head>
<body>
	<div class="col-md-3"></div>
	<div class="col-md-8">
	<h1>Stripe Payment Info</h1>
	<fieldset>
		<form action="paymentController/submit" method="POST" id="payment-form">
		  <span class="payment-errors"></span>
		  <div class="form-row">
		    <label>
		      <span>Card Number</span>
		      <input type="text" size="20" data-stripe="number"/>
		    </label>
		  </div>

		  <div class="form-row">
		    <label>
		      <span>CVC</span>
		      <input type="text" size="4" data-stripe="cvc"/>
		    </label>
		  </div>

		  <div class="form-row">
		    <label>
		      <span>Expiration (MM/YYYY)</span>
		      <input type="text" size="2" data-stripe="exp-month"/>
		    </label>
		    <span> / </span>
		    <input type="text" size="4" data-stripe="exp-year"/>
		  </div>

		  <button type="submit">Submit Payment</button>
		</form>
	</fieldset>
	</div>
	<div class="col-md-1"></div>  
</body>
</html>