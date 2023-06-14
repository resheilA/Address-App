<?php 


if(isset($_GET["Customer"]) && $_GET["Customer"] != null)
{
	$results["Customerstatus"]->customer = $_GET["Customer"];
}

?>