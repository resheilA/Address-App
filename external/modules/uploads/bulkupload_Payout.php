<?php 
$file = fopen($path, 'r');
$linecount = 0;
$uploadready = 1;


include_once("connect.php");


while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv elements
	
	if(isset($line[2]))
	{		
		if($linecount > 0)
		{

			$sql = "SELECT ridercode, ridercompany FROM riders WHERE ridercontactnumber='".$line[0]."'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
				  
			  }
			} else {
			   $errorarray[] = "Row no : " . $linecount+1 . " not added. Please check the rider contact number.<br>";
			   	$uploadready = 0;
				$uploadstr = 'No Data Added. Upload the file with changes.';
			}
			
		}
	}
	else
	{
		$errorarray[] = "Please check the format of the row.<br>";	
		$uploadready = 0;		
		$uploadstr = 'No Data Added. Upload the file with changes.';
	}
	$linecount++;
}


if($uploadready ==1)
{			
	$file = fopen($path, 'r');
	$linecount = 0;

	while (($line = fgetcsv($file)) !== FALSE) {
	//$line is an array of the csv elements	
		if(isset($line[2]))
		{		
			if($linecount > 0)
			{

				$sql = "SELECT ridercode, ridercompany FROM riders WHERE ridercontactnumber='".$line[0]."'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {
					$_POST['payoutid'] = randomstr();  
					$_POST['payoutrider'] = $row["ridercode"];
					$_POST['payoutcompany'] = $row["ridercompany"];
					$_POST['payoutaddedon'] =  date('Y-m-d H:i:s');
					$_POST['payoutamt'] = $line[1];
					$_POST['payoutstatus'] = 3;
					$_POST['payoutdescription'] = $line[2];
					
					//SAVE IT IN PAYOUT
					$Payout = new Payout;
					$Payout->storeFormValues( $_POST );
					$Payout->insert();					
				  }
				} else {
				   $errorarray[] = "Row no : " . $linecount+1 . " not added. Check the rider contact number.<br>";
				   $uploadstr = 'No Data Added. Upload the file with changes.';
				}
				
			}
		}
		else
		{
			$errorarray[] = "Please check the content of the row.<br>";			
		}
	$linecount++;
	}
	$uploadstr = 'Data Added Successfully.';
}
else
{
	$uploadstr = 'No Data Added. Upload the file with changes.';
}

$conn->close();

?>