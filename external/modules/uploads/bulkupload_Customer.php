<?php 
$file = fopen($path, 'r');
$linecount = 0;
$uploadready = 1;

include_once("connect.php");
			
while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv elements
	if(isset($line[19]))
	{
		if($linecount > 0)
		{	
			$sql_campign = "SELECT campaignname FROM Campaign WHERE id='".$line[19]."'";
			$result = $conn->query($sql_campign);
				
			if ($result->num_rows > 0) {
				$sql = "SELECT ridercode, ridercompany FROM Riders WHERE ridercontactnumber='".$line[0]."'";
				$result = $conn->query($sql);
					
				if ($result->num_rows > 0) {
					//$uploadready = 1;
				}
				else
				{
					$errorarray[] = "Row no : " . $linecount+1 . " not added. Please check the rider contact number entered.<br>";
					$uploadstr = 'No Data Added. Upload the file with changes.';
					$uploadready = 0;
				}
			}
			else
			{
				$errorarray[] = "Row no : " . $linecount+1 . " not added. Please check the campign id.<br>";
				$uploadstr = 'No Data Added. Upload the file with changes.';
				$uploadready = 0;
			}
		}
	}
	else
	{
		$errorarray[] = "Please check the format of the file.<br>";
		$uploadstr = 'No Data Added. Upload the file with changes.';
		$uploadready = 0;
	}
	$linecount++;
}


if($uploadready == 1)
{
	
	$file = fopen($path, 'r');
	$linecount = 0;

	while (($line = fgetcsv($file)) !== FALSE) {
	
		if($linecount > 0)
		{	
		$sql_campign = "SELECT campaignname FROM Campaign WHERE id='".$line[19]."'";
		$result = $conn->query($sql_campign);
					
				if ($result->num_rows > 0) {
					
					$sql = "SELECT ridercode, ridercompany FROM Riders WHERE ridercontactnumber='".$line[0]."'";
					$result = $conn->query($sql);
						
					if ($result->num_rows > 0) {
					  // output data of each row
					  while($row = $result->fetch_assoc()) {
						$_POST['cuscode'] = randomstr();  
						$_POST['assigned_to'] = $row["ridercode"];
						$_POST['assigned_company'] = $row["ridercompany"];
						$_POST['customername'] = $line[1];
						$_POST['customercontactnumber'] = $line[2];
						$_POST['customeremail'] = $line[3];
						$_POST['cushomeaddress'] = $line[4];
						$_POST['cushomepincode'] = $line[5];
						$_POST['cushomelangitude'] = $line[6];
						$_POST['cushomelongitude'] = $line[7];
						$_POST['cusofficeaddress'] = $line[8];
						$_POST['cusofficepincode'] = $line[9];
						$_POST['cusofficelangitude'] = $line[10];
						$_POST['cusofficelongitude'] = $line[11];
						$_POST['cusarea'] = $line[12];
						$_POST['customernote'] = $line[13];
						$_POST['cyc'] = $line[14];
						$_POST['pos'] = $line[15];
						$_POST['tad'] = $line[16];
						$_POST['tpd'] = $line[17];
						$_POST['cuscost'] = $line[18];
						$_POST['customercampaign'] = $line[19];
						$_POST['customer_block'] = 2;
						//SAVE IT IN PAYOUT
						$Customer = new Customer;
						$Customer->storeFormValues( $_POST );
						$Customer->insert();					
					  }
					  
					}
					else {
					   $errorarray[] = "Error in uploading Row no : " . $linecount+1 . " to database.<br>";
					   $uploadstr = 'No Data Added. Upload the file with changes.';
					}
				}
				else {
					   $errorarray[] = "Error in uploading Row no : " . $linecount+1 . " to database. <br>";
					   $uploadstr = 'No Data Added. Upload the file with changes.';
					}
					
		}
	$linecount++;	
	}
	$uploadstr = 'Succssfully Uploaded all the enteries.';
}
else
{
	$uploadstr = 'No Data Added. Upload the file with changes.';
}


$conn->close();
?>