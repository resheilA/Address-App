
<?php include "templates/include/Companyheader.php" ?>

					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>
					
					   <?php 
					   echo 
					   "<a href='Company.php?action=editCampaign&CampaignId=".$results["Campaign"]->id."'><button class='btn-primary'>".convertlang("Main|Edit")."</button></a>
					   ";
					   ?>
						
			<hr>
			<table class="table">
				<tbody>
      			
					<tr>
						<td><?php echo convertlang("Campaign|id"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Campaign']->id ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Campaign|campaignname"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Campaign']->campaignname ); ?></td>
					</tr>	
						
					<tr>
						<td><?php echo convertlang("Campaign|campaigndescription"); ?></td> 
						<td><?php echo htmlspecialchars( $results['Campaign']->campaigndescription ); ?></td>
					</tr>	
			<tr>
				<td><?php echo convertlang("Campaign|campaigncompany"); ?></td> 
				<td><?php echo Company::getByCompanycode( $results["Campaign"]->campaigncompany)->companyname; ?></td>
				</tr>
	  </tbody>
			</table>
      <p><a href="Company.php?action=listCampaign">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
	