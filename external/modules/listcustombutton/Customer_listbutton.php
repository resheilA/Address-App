<?php /* <td><a href='Company.php?action=editCustomer&amp;CustomerId=1' '=''><button 
class='btn-primary'> Edit</button></a></td> */


echo "<td><a target='_blank' href='https://www.google.com/maps?saddr=My+Location&daddr=".$Customer->cushomelangitude.",".$Customer->cushomelongitude."'>Directions</a></td>
	";

include("connect.php");


$sql = "SELECT customerstatus.id, customerstatus.latitude, customerstatus.longitude, cushomelangitude,cushomelongitude FROM customer JOIN customerstatus on customer.id = customerstatus.customer where customerstatus.customer = '".$Customer->id."' LIMIT 1";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	echo "
	<td><a href='?action=editCustomerstatus&amp;CustomerstatusId=".$row["id"]."'><button class='btn-primary'>Edit Status</button></a></td>";
  }
} else {
	echo "<td><a href='?action=newCustomerstatus&amp;Customer=".$Customer->id."'><button class='btn-primary'>Add Status</button></a></td>";
}

mysqli_close($conn);


?>
