<?php

require_once("./PaytmChecksum.php");

/* initialize an array */
$paytmParams = array();

/* add parameters in Array */
$paytmParams["MID"] = $_GET['mid'];
$paytmParams["ORDERID"] = $_GET['order'];
// echo $_GET['mid'];
// echo $_GET['order'];
// echo $_GET['key'];
/**
* Generate checksum by parameters we have
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($paytmParams, $_GET['key']);
$verifySignature = PaytmChecksum::verifySignature($paytmParams, $_GET['key'], $paytmChecksum);
//echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
//echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);


/* initialize JSON String */
//$body = "{\"mid\":\"XVNIki66916401398815\",\"orderId\":\"5555\"}";
$myArr = array("mid" => $_GET['mid'], "orderId" => $_GET['order']);

$body = json_encode($myArr);
//echo $body;

/**
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($body, $_GET['key']);
$verifySignature = PaytmChecksum::verifySignature($body, $_GET['key'], $paytmChecksum);
echo sprintf($paytmChecksum);
//echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);
//$myArr = array("checksum"=>$paytmChecksum, "verified"=>$verifySignature);

//$myJSON = json_encode($myArr);

//echo $myJSON;