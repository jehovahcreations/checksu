<?php

require_once("./PaytmChecksum.php");

/* initialize an array */
$paytmParams = array();

/* add parameters in Array */
$paytmParams["MID"] = $_GET['mid'];
$paytmParams["ORDERID"] = $_GET['order'];

/**
 * Generate checksum by parameters we have
 * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
 */
$paytmChecksum = PaytmChecksum::generateSignature($paytmParams, $_GET['key']);
$verifySignature = PaytmChecksum::verifySignature($paytmParams, $_GET['key'], $paytmChecksum);
return json_encode($paytmChecksum);
// echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
// echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);

// $json = array("mid"=> $_GET['mid'],"orderId"=> $_GET['order']);
// /* initialize JSON String */
// $body = json_encode($json);

// /**
//  * Generate checksum by parameters we have in body
//  * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
//  */
// $paytmChecksum = PaytmChecksum::generateSignature($body, $_GET['key']);
// $verifySignature = PaytmChecksum::verifySignature($body, $_GET['key'], $paytmChecksum);
// echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
// echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);
