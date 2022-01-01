<?php

require_once("./PaytmChecksum.php");

/* initialize an array */
$paytmParams = array();

/* add parameters in Array */
$paytmParams["MID"] = "XVNIki66916401398815";
$paytmParams["ORDERID"] = $_GET['orderId'];
echo $_GET['orderId'];
/**
* Generate checksum by parameters we have
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($paytmParams, 'n1CIsHE5hcmzNhMW');
$verifySignature = PaytmChecksum::verifySignature($paytmParams, 'n1CIsHE5hcmzNhMW', $paytmChecksum);
//echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
//echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);


/* initialize JSON String */  
$body = "{\"mid\":\"XVNIki66916401398815\",\"orderId\":\"5555\"}";

/**
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($body, 'n1CIsHE5hcmzNhMW');
$verifySignature = PaytmChecksum::verifySignature($body, 'n1CIsHE5hcmzNhMW', $paytmChecksum);
//echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
//echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);
$myArr = array("checksum"=>$paytmChecksum, "verified"=>$verifySignature);

$myJSON = json_encode($myArr);

echo $myJSON;