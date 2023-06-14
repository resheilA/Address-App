
<?php include "templates/include/Ridersheader.php" ?>

					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>
						
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
				<td><?php echo convertlang("Campaign|payoutrider"); ?></td> 
				<td><?php echo Riders::getByRidercode( $results["Campaign"]->payoutrider)->ridername; ?></td>
				</tr><tr>
				<td><?php echo convertlang("Campaign|payoutcompany"); ?></td> 
				<td><?php echo Company::getByCompanycode( $results["Campaign"]->payoutcompany)->companyname; ?></td>
				</tr>			
					<tr>
						<td><?php echo convertlang("Campaign|payoutamt"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Campaign']->payoutamt ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Campaign|payoutaddedon"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Campaign']->payoutaddedon ); ?></td>
					</tr>	
			<tr>
				<td><?php echo convertlang("Campaign|payoutstatus"); ?></td> 
				<td><?php echo Paymentmode::getById( $results["Campaign"]->payoutstatus)->paymentmodename; ?></td>
				</tr>			
					<tr>
						<td><?php echo convertlang("Campaign|payoutdescription"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Campaign']->payoutdescription ); ?></td>
					</tr>	
			
	  </tbody>
			</table>
      <p><a href="Riders.php?action=listCampaign">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
	