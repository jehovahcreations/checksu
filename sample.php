<?php

require_once("./PaytmChecksum.php");

/* initialize an array */
$paytmParams = array();

/* add parameters in Array */
$paytmParams["MID"] = "NBXLHA89674602386110";
$paytmParams["ORDERID"] = "5555";

/**
* Generate checksum by parameters we have
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($paytmParams, '@9c3YZKKTvIbWbAa');
$verifySignature = PaytmChecksum::verifySignature($paytmParams, '@9c3YZKKTvIbWbAa', $paytmChecksum);
//echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
//echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);


/* initialize JSON String */  
$body = "{\"mid\":\"NBXLHA89674602386110\",\"orderId\":\"5555\"}";

/**
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($body, '@9c3YZKKTvIbWbAa');
$verifySignature = PaytmChecksum::verifySignature($body, '@9c3YZKKTvIbWbAa', $paytmChecksum);
echo sprintf($paytmChecksum);
//echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);
//$myArr = array("checksum"=>$paytmChecksum, "verified"=>$verifySignature);

//$myJSON = json_encode($myArr);

//echo $myJSON;