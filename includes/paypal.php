<?php
require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost/GDL_WebCamp');

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        //ClienteID
        'AdTc0x_SUww5tk0r8tUHIc7PYqDig_LL1sVGlJpizuqIkoJq2XuVY531VVKhvPmRYXdyDSuipU3wlSd7',
        //Secret
        'EHstsA9kJbBw03N-O3RUqRpoC9MUNBihmX0eBrQ2pkXC-Mq_9G8LagUkOUVvAgIRbb-gGEmfbiTUVASu'
    )
);
