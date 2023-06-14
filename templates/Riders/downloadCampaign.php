
		
		<?php include "templates/include/Ridersheader.php" ?>

						<br><br>
						  <h1><?php echo convertlang($results['pageTitle']); ?></h1>
						<label for="payoutdescription"><?php echo convertlang('Campaign|payoutdescription'); ?></label>
					<select name="downloadoption" class="form-control" id="" placeholder=""><option value='id'><?php echo convertlang('Payout|id'); ?></option><option value='payoutid'><?php echo convertlang('Payout|payoutid'); ?></option><option value='payoutrider'><?php echo convertlang('Payout|payoutrider'); ?></option><option value='payoutcompany'><?php echo convertlang('Campaign|payoutcompany'); ?></option><option value='payoutamt'><?php echo convertlang('Campaign|payoutamt'); ?></option><option value='payoutaddedon'><?php echo convertlang('Campaign|payoutaddedon'); ?></option><option value='payoutstatus'><?php echo convertlang('Campaign|payoutstatus'); ?></option><option value='payoutdescription'><?php echo convertlang('Campaign|payoutdescription'); ?></option><?php include "templates/include/footer.php" ?>