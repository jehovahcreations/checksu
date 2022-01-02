<?php

require_once("./PaytmChecksum.php");

/* initialize an array */
$paytmParams = array();
$data = json_decode(file_get_contents('php://input'), true);
print_r($data);
/* add parameters in Array */
$paytmParams["MID"] = $_GET['mid'];
$paytmParams["ORDERID"] = $_GET['order'];

/**
 * Generate checksum by parameters we have
 * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
 */
 $paytmChecksum = PaytmChecksum::generateSignature($paytmParams, $_GET['key']);
 $verifySignature = PaytmChecksum::verifySignature($paytmParams, $_GET['key'], $paytmChecksum);
$jaas = array("CHECKSUMHASH" => $paytmChecksum);
echo json_encode($jaas);

// echo json_encode({})
// echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
// echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);

// $json = array("mid"=> $_GET['mid'],"orderId"=> $_GET['order']);
// /* initialize JSON String */
// $body = json_encode($json);
// //$body = "{"\mid\":"\YOUR_MID_HERE\","\orderId\":"\YOUR_ORDER_ID_HERE\"}";
// //echo $body;
// /**
//  * Generate checksum by parameters we have in body
//  * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
//  */
// $paytmChecksum = PaytmChecksum::generateSignature($body, $_GET['key']);
// $verifySignature = PaytmChecksum::verifySignature($body, $_GET['key'], $paytmChecksum);
// $jaas = array("CHECKSUMHASH"=> $verifySignature);
// echo json_encode($jaas);
// echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
// echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);
