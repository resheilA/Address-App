
<?php include "templates/include/header.php" ?>

					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>
					   <?php 
					   echo 
					   "<a href='admin.php?action=editCompany&CompanyId=".$results["Company"]->id."'><button class='btn-primary'>".convertlang("Main|Edit")."</button></a>
					   ";
					   ?>
					   
					     <?php 
					   echo 
					   "<a href='admin.php?action=deleteCompany&CompanyId=".$results["Company"]->id."'><button class='btn-danger'  onclick='return confirm(\"".convertlang("Main|Delete Company|objname")." ?\")'>".convertlang("Main|Delete")."</button></a>
					   ";
					   ?>
			<hr>
			<table class="table">
				<tbody>
      			
					<tr>
						<td><?php echo convertlang("Company|id"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Company']->id ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Company|companyname"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Company']->companyname ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Company|companycontact"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Company']->companycontact ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Company|companyaddress"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Company']->companyaddress ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Company|gstno"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Company']->gstno ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Company|logo"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Company']->logo ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Company|companypan"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Company']->companypan ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Company|companycoi"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Company']->companycoi ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Company|companygst"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Company']->companygst ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Company|companydirectordoc"); ?></td> 
						<td><img src="<?php echo htmlspecialchars( $results['Company']->companydirectordoc ); ?>" style="height:3em;"/></td>
					</tr>	
							
					<tr>
						<td><?php echo convertlang("Company|companycode"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Company']->companycode ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Company|adminusername"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Company']->adminusername ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Company|cashfreeapikey"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Company']->cashfreeapikey ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Company|cashfreeapipass"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Company']->cashfreeapipass ); ?></td>
					</tr>	
			<?php $results['Company']->adminpassword= "*******"; ?>			
					<tr>
						<td><?php echo convertlang("Company|adminpassword"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Company']->adminpassword ); ?></td>
					</tr>	
			<tr>
				<td><?php echo convertlang("Company|company_block"); ?></td> 
				<td><?php echo Flag::getByflagvalue( $results["Company"]->company_block)->flagname; ?></td>
				</tr>
	  </tbody>
			</table>
      <p><a href="admin.php?action=listCompany">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
	