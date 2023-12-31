
<?php include "templates/include/Companyheader.php" ?>

					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>
					
					   <?php 
					   echo 
					   "<a href='Company.php?action=editCustomerstatus&CustomerstatusId=".$results["Customerstatus"]->id."'><button class='btn-primary'>".convertlang("Main|Edit")."</button></a>
					   ";
					   ?>
										
					     <?php 
					   echo 
					   "<a href='Company.php?action=deleteCustomerstatus&CustomerstatusId=".$results["Customerstatus"]->id."'><button class='btn-danger'  onclick='return confirm(\"".convertlang("Main|Delete Customerstatus|objname")." ?\")'>".convertlang("Main|Delete")."</button></a>
					   ";
					   ?>
						
			<hr>
			<table class="table">
				<tbody>
      			
					<tr>
						<td><?php echo convertlang("Customerstatus|id"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customerstatus']->id ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customerstatus|latitude"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customerstatus']->latitude ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customerstatus|longitude"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customerstatus']->longitude ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customerstatus|visitpicture1"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Customerstatus']->visitpicture1 ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Customerstatus|visitpicture2"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Customerstatus']->visitpicture2 ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Customerstatus|visitpicture3"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Customerstatus']->visitpicture3 ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Customerstatus|collectedamount"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customerstatus']->collectedamount ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customerstatus|code"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customerstatus']->code ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customerstatus|remarks"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customerstatus']->remarks ); ?></td>
					</tr>	
			<tr>
				<td><?php echo convertlang("Customerstatus|customer"); ?></td> 
				<td><?php echo Customer::getById( $results["Customerstatus"]->customer)->customername; ?></td>
				</tr><tr>
				<td><?php echo convertlang("Customerstatus|statuscompany"); ?></td> 
				<td><?php echo Company::getByCompanycode( $results["Customerstatus"]->statuscompany)->companyname; ?></td>
				</tr>			
					<tr>
						<td><?php echo convertlang("Customerstatus|statusrider"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customerstatus']->statusrider ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customerstatus|cusstatecode"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customerstatus']->cusstatecode ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customerstatus|customerstatusaddedon"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customerstatus']->customerstatusaddedon ); ?></td>
					</tr>	
			
	  </tbody>
			</table>
      <p><a href="Company.php?action=listCustomerstatus">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
	