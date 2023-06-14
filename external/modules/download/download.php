<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "addressapp";

/*
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = mysqli_query($conn, 'SELECT ridername, rideraddress, ridercontactnumber, bankifsc,bankaccno,riderbeneid, ridercode FROM riders');
$fp = fopen('save.csv', 'w');
$rowhead = array("Name", "Address", "Contactnumber", "Bankifsc","Bankaccno","beneid", "ID");
fputcsv($fp, $rowhead);  

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
fputcsv($fp, $row);  
}
fclose($fp);

*/


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = mysqli_query($conn, 'SELECT customername, customercontactnumber, customeremail, cushomeaddress, cushomepincode, cushomelangitude, cushomelongitude, cusofficeaddress, cusofficepincode, cusofficelangitude, cusofficelongitude, cusarea, customernote, cyc, pos, tad, tpd, cuscode, status,ridername, cuscost, campaignname, customer.added_on FROM customer JOIN riders ON riders.ridercode = customer.assigned_to JOIN campaign ON campaign.id = customer.customercampaign');
$fp = fopen('save.csv', 'w');

$rowhead = array("Name", "Contactnumber", "Email", "Address", "Pincode", "Langitude", "Longitude", "Officeaddress", "Officepincode", "Officelangitude", "Officelongitude", "Area", "Note", "Cyc", "POS", "TAD", "TPD", "Code", "Status", "Ridername", "Cost", "Campaign",  "Addedon");
fputcsv($fp, $rowhead);  

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
fputcsv($fp, $row);  
}
fclose($fp);

header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="save.csv"');
exit();

?>