<div class="row">
		<div class="col-3">	
		<a href="?action=listCustomer">	
		  <div class="card bg-warning text-white">
			<div class="card-body">List All Customers</div>
		  </div>
		</a>  
		</div>
		

		<div class="col-3">	
		<a href="?action=listCustomerstatus">	
		  <div class="card bg-warning text-white">
			<div class="card-body">List All Customer Status</div>
		  </div>
		</a>  
		</div> 

		<div class="col-3">	
		<a href="?action=listPayout">	
		  <div class="card bg-warning text-white">
			<div class="card-body">Your Payouts</div>
		  </div>
		</a>  
		</div> 
		
		
		<div class="col-3">	
		<a href="?action=editRiders">	
		  <div class="card bg-warning text-white">
			<div class="card-body">Edit Profile</div>
		  </div>
		</a>  
		</div> 
</div>
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