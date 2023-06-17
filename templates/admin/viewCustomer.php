
<?php include "templates/include/header.php" ?>

					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>
					   <?php 
					   echo 
					   "<a href='admin.php?action=editCustomer&CustomerId=".$results["Customer"]->id."'><button class='btn-primary'>".convertlang("Main|Edit")."</button></a>
					   ";
					   ?>
					   
					     <?php 
					   echo 
					   "<a href='admin.php?action=deleteCustomer&CustomerId=".$results["Customer"]->id."'><button class='btn-danger'  onclick='return confirm(\"".convertlang("Main|Delete Customer|objname")." ?\")'>".convertlang("Main|Delete")."</button></a>
					   ";
					   ?>
			<hr>
			<table class="table">
				<tbody>
      			
					<tr>
						<td><?php echo convertlang("Customer|id"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->id ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|customername"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->customername ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|customercontactnumber"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->customercontactnumber ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|customeremail"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->customeremail ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|cyc"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->cyc ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|pos"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->pos ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|tpd"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->tpd ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|tad"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->tad ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|cuscost"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->cuscost ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|cushomeaddress"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->cushomeaddress ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|cushomepincode"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->cushomepincode ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|cushomelangitude"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->cushomelangitude ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|cushomelongitude"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->cushomelongitude ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|cusofficeaddress"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->cusofficeaddress ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|cusofficepincode"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->cusofficepincode ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|cusofficelangitude"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->cusofficelangitude ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|cusofficelongitude"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->cusofficelongitude ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|cusarea"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->cusarea ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|customernote"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->customernote ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Customer|cuscode"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->cuscode ); ?></td>
					</tr>	
			<tr>
				<td><?php echo convertlang("Customer|assigned_to"); ?></td> 
				<td><?php echo Riders::getByridercode( $results["Customer"]->assigned_to)->ridername; ?></td>
				</tr><tr>
				<td><?php echo convertlang("Customer|customer_block"); ?></td> 
				<td><?php echo Flag::getByflagvalue( $results["Customer"]->customer_block)->flagname; ?></td>
				</tr><tr>
				<td><?php echo convertlang("Customer|assigned_company"); ?></td> 
				<td><?php echo Company::getBycompanycode( $results["Customer"]->assigned_company)->companyname; ?></td>
				</tr><tr>
				<td><?php echo convertlang("Customer|customercampaign"); ?></td> 
				<td><?php echo Campaign::getByid( $results["Customer"]->customercampaign)->campaignname; ?></td>
				</tr>			
					<tr>
						<td><?php echo convertlang("Customer|customeraddedon"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Customer']->customeraddedon ); ?></td>
					</tr>	
			
	  </tbody>
			</table>
      <p><a href="admin.php?action=listCustomer">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
	