<?php 
$key_id = "rzp_test_X2fF4dYdxyEC3G";
$secret = "P38z7To30fNO56s0xKexscvR";
$payment_status = "failed";

$generated_signature = hash_hmac('sha256', $_SESSION["order_process"] . "|" . $_POST['razorpay_payment_id'], $secret);

  if ($generated_signature == $_POST["razorpay_signature"]) {
	$payment_status = "Successful";
	include_once("invoice.php");
	updatestatus("Successful",$_SESSION["order_process"]);
  }
  else
  {
	  $payment_status = "Failure";
	  updatestatus("Unsucessful",$_SESSION["order_process"]);
  }

?>	