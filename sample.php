<?php

require_once("./PaytmChecksum.php");

/* initialize an array */
$paytmParams = array();
// $data = file_get_contents('php://input');
// echo 
/* add parameters in Array */
$paytmParams["MID"] = $_GET['mid'];
$paytmParams["ORDERID"] = $_GET['order'];
$paytmParams["CUST_ID"] = $_GET['CUST_ID'];
$paytmParams["CHANNEL_ID"] = $_GET['CHANNEL_ID'];
$paytmParams["TXN_AMOUNT"] = $_GET['TXN_AMOUNT'];
$paytmParams["WEBSITE"] = $_GET['WEBSITE'];
$paytmParams["INDUSTRY_TYPE_ID"] = $_GET['INDUSTRY_TYPE_ID'];
$paytmParams["CALLBACK_URL"] =
"https://securegw-stage.paytm.in/theia/paytmCallback?ORDER_ID=$orderId";

/**
 * Generate checksum by parameters we have
 * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
 */
 $paytmChecksum = PaytmChecksum::generateSignature($paytmParams, $_GET['key']);
 $verifySignature = PaytmChecksum::verifySignature($paytmParams, $_GET['key'], $paytmChecksum);
$jaas = array("CHECKSUMHASH" => $paytmChecksum);
$isVerifySignature = PaytmChecksum::verifySignature($paytmParams, $_GET['key'], $paytmChecksum);
echo $paytmChecksum;
if ($isVerifySignature) {
    echo json_encode($jaas,JSON_UNESCAPED_SLASHES);
} else {
    echo "Checksum Mismatched";
}


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
