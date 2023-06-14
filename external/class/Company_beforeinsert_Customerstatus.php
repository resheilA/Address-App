<?php 

include("external/connect.php");

$sql = "SELECT assigned_to,assigned_company FROM Customer where id = '".$_POST["customer"]."' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {		
		$_POST["statusrider"] = $row["assigned_to"];
		$_POST["statuscompany"] = $row["assigned_company"];		
	}
}
mysqli_close($conn);


?>