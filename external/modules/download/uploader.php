<?php 

$folder = "uploads/";

echo $path = $folder . basename( $_FILES['file']['name']); 

if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
    echo "The file ".  basename( $_FILES['file']['name']). " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}

$row = 1;
if (($handle = fopen($path, "r")) !== FALSE) {
	echo "<table border='1'>";
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n
		echo "<tr>";
		
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo "<td>".$data[$c]."</td>";
        }
		
		echo "</tr>";
    }
	echo "</table>";
    fclose($handle);
}
?>