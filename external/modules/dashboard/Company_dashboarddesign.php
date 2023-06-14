<?php echo "Hello ".$_SESSION["companyname"]. "! ". getgreeting(); 

function getgreeting(){
	$b = time();

    $hour = date("g", $b);
    $m    = date("A", $b);

    if ($m == "AM") {
      if ($hour == 12) {
        $greeting =  "Good Evening!";
      } elseif ($hour < 4) {
        $greeting = "Good Evening!";
      } elseif ($hour > 3) {
        $greeting = "Good Morning!";
      }
    }

        elseif ($m == "PM") {
      if ($hour == 12) {
        $greeting = "Good Afternoon!";
      } elseif ($hour < 6) {
        $greeting = "Good Afternoon!";
      } elseif ($hour > 5) {
        $greeting = "Good Evening!";
      }
    }
	
	return $greeting;
}

?>