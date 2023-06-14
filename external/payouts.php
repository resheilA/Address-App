<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://payout-gamma.cashfree.com/payout/v1/authorize');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$api_key = "CF386631CHH1CMMMGUC11C493A80";
$api_pass = "6d2440de4b589aa3b7a75d7bd099cac1dd6ee70c";

$headers = array();
$headers[] = 'X-Client-Id: '.$api_key;
$headers[] = 'X-Client-Secret: '.$api_pass;
$headers[] = 'Cache-Control: no-cache';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result_token = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$token_array = json_decode($result_token, 1);
$token = $token_array["data"]["token"];


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://payout-gamma.cashfree.com/payout/v1/addBeneficiary');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"beneId\": \"MMMM\",\n  \"name\": \"Mcor\",\n  \"email\": \"johndoe@cashfree.com\",\n  \"phone\": \"9999999999\",\n  \"bankAccount\": \"0022443141300\",\n  \"ifsc\": \"YESB0000001\",\n  \"address1\": \"ABC Street\",\n  \"city\": \"Bangalore\",\n  \"state\": \"Karnataka\",\n  \"pincode\": \"560001\"\n}");

$headers = array();
$headers[] = 'Authorization: Bearer '.$token;
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result_beni = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

var_dump($result_beni);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://payout-gamma.cashfree.com/payout/v1/requestTransfer');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"beneId\": \"MMMM\",\n  \"amount\": \"10.00\",\n  \"transferId\": \"".rand(10000000,9999999999)."\"\n}");

$headers = array();
$headers[] = 'Authorization: Bearer '.$token;
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

var_dump($result);
?>
