<?php /* <td><a href='Company.php?action=editCustomer&amp;CustomerId=1' '=''><button 
class='btn-primary'> Edit</button></a></td> */
include("connect.php");

$sql = "SELECT Customer.id, Customerstatus.latitude, Customerstatus.longitude, cushomelangitude,cushomelongitude FROM Customerstatus JOIN Customer on Customer.id = Customerstatus.customer where Customerstatus.id = '".$Customerstatus->id."' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  //<td><a target='_blank' href='external/maps.php?clLAT=".$row["cushomelangitude"]."&clLONG=".$row["cushomelongitude"]."&riLAT=".$row["latitude"]."&riLONG=".$row["longitude"]."'>On Map</a></td>
  while($row = mysqli_fetch_assoc($result)) {
	echo "
	<td><a target='_blank' href='external/maps.php?clLAT=".$row["cushomelangitude"]."&clLONG=".$row["cushomelongitude"]."&riLAT=".$row["latitude"]."&riLONG=".$row["longitude"]."'>On Map</a></td>
	";
  }
}

mysqli_close($conn);


?>
