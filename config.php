<?php
	require_once "stripe-php-master/init.php";
	require_once "products.php";

	$stripeDetails = array(
		"secretKey" => "sk_test_51IuCeFHrg1qNgYDsX4d1tDWJrgXY1PUwUXal8pmDNjOr1sfTa22goBcMbLW4W8xwcxdS1lQuQmCuATGDWZjmLMgQ00pOCVvDpf",
		"publishableKey" => "pk_test_51IuCeFHrg1qNgYDsK5o50as3vd9SFinaiwS80Ep3e1uDkpmcvWjQuWdl1VFW63E20jOJX0Jn4uquGK7zTDrN45Ii004XfmORlQ"
	);

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
