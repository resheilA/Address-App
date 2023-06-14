
<?php include "templates/include/header.php" ?>

					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>
					   <?php 
					   echo 
					   "<a href='admin.php?action=editPayout&PayoutId=".$results["Payout"]->id."'><button class='btn-primary'>".convertlang("Main|Edit")."</button></a>
					   ";
					   ?>
					   
					     <?php 
					   echo 
					   "<a href='admin.php?action=deletePayout&PayoutId=".$results["Payout"]->id."'><button class='btn-danger'  onclick='return confirm(\"".convertlang("Main|Delete Payout|objname")." ?\")'>".convertlang("Main|Delete")."</button></a>
					   ";
					   ?>
			<hr>
			<table class="table">
				<tbody>
      			
					<tr>
						<td><?php echo convertlang("Payout|id"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Payout']->id ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Payout|payoutid"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Payout']->payoutid ); ?></td>
					</tr>	
			<tr>
				<td><?php echo convertlang("Payout|payoutrider"); ?></td> 
				<td><?php echo Riders::getByridercode( $results["Payout"]->payoutrider)->ridername; ?></td>
				</tr><tr>
				<td><?php echo convertlang("Payout|payoutcompany"); ?></td> 
				<td><?php echo Company::getBycompanycode( $results["Payout"]->payoutcompany)->companyname; ?></td>
				</tr>			
					<tr>
						<td><?php echo convertlang("Payout|payoutamt"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Payout']->payoutamt ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Payout|payoutaddedon"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Payout']->payoutaddedon ); ?></td>
					</tr>	
			<tr>
				<td><?php echo convertlang("Payout|payoutstatus"); ?></td> 
				<td><?php echo Paymentmode::getByid( $results["Payout"]->payoutstatus)->paymentmodename; ?></td>
				</tr>			
					<tr>
						<td><?php echo convertlang("Payout|payoutdescription"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Payout']->payoutdescription ); ?></td>
					</tr>	
			
	  </tbody>
			</table>
      <p><a href="admin.php?action=listPayout">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
	