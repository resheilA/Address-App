
<?php include "templates/include/header.php" ?>

					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>
					   <?php 
					   echo 
					   "<a href='admin.php?action=editProperty&PropertyId=".$results["Property"]->id."'><button class='btn-primary'>".convertlang("Main|Edit")."</button></a>
					   ";
					   ?>
					   
					     <?php 
					   echo 
					   "<a href='admin.php?action=deleteProperty&PropertyId=".$results["Property"]->id."'><button class='btn-danger'  onclick='return confirm(\"".convertlang("Main|Delete Property|objname")." ?\")'>".convertlang("Main|Delete")."</button></a>
					   ";
					   ?>
			<hr>
			<table class="table">
				<tbody>
      			
					<tr>
						<td><?php echo convertlang("Property|id"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Property']->id ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Property|ownername"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Property']->ownername ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Property|ownercontactnumber"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Property']->ownercontactnumber ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Property|owneremail"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Property']->owneremail ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Property|propertyaddress"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Property']->propertyaddress ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Property|propertypincode"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Property']->propertypincode ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Property|propertylangitude"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Property']->propertylangitude ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Property|propertylongitude"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Property']->propertylongitude ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Property|ownernote"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Property']->ownernote ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Property|propertynote"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Property']->propertynote ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Property|uni_code"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Property']->uni_code ); ?></td>
					</tr>	
			<tr>
				<td><?php echo convertlang("Property|assigned_to"); ?></td> 
				<td><?php echo Riders::getById( (int)$results["Property"]->assigned_to)->ridername; ?></td>
				</tr><tr>
				<td><?php echo convertlang("Property|property_block"); ?></td> 
				<td><?php echo Flag::getById( (int)$results["Property"]->property_block)->flagname; ?></td>
				</tr><tr>
				<td><?php echo convertlang("Property|assigned_company"); ?></td> 
				<td><?php echo Company::getById( (int)$results["Property"]->assigned_company)->companyname; ?></td>
				</tr>
	  </tbody>
			</table>
      <p><a href="admin.php?action=listProperty">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
	