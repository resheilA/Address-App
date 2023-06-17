
<?php include "templates/include/Companyheader.php" ?>

					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>
					
					   <?php 
					   echo 
					   "<a href='Company.php?action=editRiders&RidersId=".$results["Riders"]->id."'><button class='btn-primary'>".convertlang("Main|Edit")."</button></a>
					   ";
					   ?>
						
			<hr>
			<table class="table">
				<tbody>
      			
					<tr>
						<td><?php echo convertlang("Riders|id"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Riders']->id ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Riders|ridername"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Riders']->ridername ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Riders|rideraddress"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Riders']->rideraddress ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Riders|ridercontactnumber"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Riders']->ridercontactnumber ); ?></td>
					</tr>	
			<tr>
				<td><?php echo convertlang("Riders|ridercompany"); ?></td> 
				<td><?php echo Company::getByCompanycode( $results["Riders"]->ridercompany)->companyname; ?></td>
				</tr>			
					<tr>
						<td><?php echo convertlang("Riders|riderage"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Riders']->riderage ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Riders|riderprofilepic"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Riders']->riderprofilepic ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Riders|rideraadharcard"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Riders']->rideraadharcard ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Riders|riderpancard"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Riders']->riderpancard ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Riders|riderresidence"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Riders']->riderresidence ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Riders|riderdra"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Riders']->riderdra ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Riders|riderpcc"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Riders']->riderpcc ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Riders|bankaccno"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Riders']->bankaccno ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Riders|bankifsc"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Riders']->bankifsc ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Riders|riderbeneid"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Riders']->riderbeneid ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Riders|ridercode"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Riders']->ridercode ); ?></td>
					</tr>	
			<?php $results['Riders']->password= "*******"; ?>			
					<tr>
						<td><?php echo convertlang("Riders|password"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Riders']->password ); ?></td>
					</tr>	
			<tr>
				<td><?php echo convertlang("Riders|rider_block"); ?></td> 
				<td><?php echo Flag::getByFlagvalue( $results["Riders"]->rider_block)->flagname; ?></td>
				</tr>			
					<tr>
						<td><?php echo convertlang("Riders|rideraddedon"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Riders']->rideraddedon ); ?></td>
					</tr>	
			
	  </tbody>
			</table>
      <p><a href="Company.php?action=listRiders">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
	