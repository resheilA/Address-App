<?php include "templates/include/Ridersheader.php" ?>
					
					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>

				<?php if ( isset( $results['errorMessage'] ) ) { ?>
						<div class="alert-danger"><?php echo $results['errorMessage'] ?></div>
				<?php } ?>


					  <form action="Riders.php?action=<?php echo $results['formAction']?>" enctype="multipart/form-data" method="post">
						<input type="hidden" name="CampaignId" value="<?php echo $results['Campaign']->id ?>"/>
		
				
							
				<input type="hidden" class="form-control" name="id" value="<?php echo $results['Payout']->id ?>"/>
					
				<input type="hidden" class="form-control" name="payoutid" value="<?php if($results['Payout']->payoutid == ""){echo randomstr(15);}else{echo $results['Payout']->payoutid;} ?>"/>
				</br>
				<label for="payoutrider"><?php echo convertlang('Payout|payoutrider'); ?></label>
				<select name="payoutrider" class="form-control" id="payoutrider" placeholder="<?php echo convertlang('Payout|payoutrider'); ?>">
				<?php 
					if($results['Campaign']->payoutrider != null)
					{
						echo '<option value="'.Riders::getByRidercode( $results['Campaign']->payoutrider)->ridercode.'">'.Riders::getByRidercode( $results['Campaign']->payoutrider)->ridername.'</option>';
					}
						
						foreach($data_Riders["results"] as $payoutrider_option)
						{	
						echo '<option value="'.$payoutrider_option->ridercode.'">'.$payoutrider_option->ridername.'</option>';	
						}
				?>	
				</select>
				</br>
				<label for="payoutcompany"><?php echo convertlang('Campaign|payoutcompany'); ?></label>
				<select name="payoutcompany" class="form-control" id="payoutcompany" placeholder="<?php echo convertlang('Campaign|payoutcompany'); ?>">
				<?php 
					if($results['Campaign']->payoutcompany != null)
					{
						echo '<option value="'.Company::getByCompanycode( $results['Campaign']->payoutcompany)->companycode.'">'.Company::getByCompanycode( $results['Campaign']->payoutcompany)->companyname.'</option>';
					}
						
						foreach($data_Company["results"] as $payoutcompany_option)
						{	
						echo '<option value="'.$payoutcompany_option->companycode.'">'.$payoutcompany_option->companyname.'</option>';	
						}
				?>	
				</select>
				</br>
				<label for="payoutamt"><?php echo convertlang('Campaign|payoutamt'); ?></label>
				<input type="number" class="form-control" name="payoutamt" id="payoutamt" placeholder="<?php echo convertlang('Campaign|payoutamt'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Campaign']->payoutamt )?>" />
				</br>
				<label for="payoutaddedon"><?php echo convertlang('Campaign|payoutaddedon'); ?></label>
				<input type="datetime-local" class="form-control" name="payoutaddedon" id="payoutaddedon" placeholder="<?php echo convertlang('Campaign|payoutaddedon'); ?>" value="<?php echo htmlspecialchars( $results['Campaign']->payoutaddedon )?>" />
				</br>
				<label for="payoutstatus"><?php echo convertlang('Campaign|payoutstatus'); ?></label>
				<select name="payoutstatus" class="form-control" id="payoutstatus" placeholder="<?php echo convertlang('Campaign|payoutstatus'); ?>">
				<?php 
					if($results['Campaign']->payoutstatus != null)
					{
						echo '<option value="'.Paymentmode::getById( $results['Campaign']->payoutstatus)->id.'">'.Paymentmode::getById( $results['Campaign']->payoutstatus)->paymentmodename.'</option>';
					}
						
						foreach($data_Paymentmode["results"] as $payoutstatus_option)
						{	
						echo '<option value="'.$payoutstatus_option->id.'">'.$payoutstatus_option->paymentmodename.'</option>';	
						}
				?>	
				</select>
				</br>
				<label for="payoutdescription"><?php echo convertlang('Campaign|payoutdescription'); ?></label>
				<textarea name="payoutdescription" class="form-control" id="payoutdescription" style="height: 5em;"  placeholder="<?php echo convertlang('Campaign|payoutdescription'); ?>"><?php echo htmlspecialchars(  $results['Campaign']->payoutdescription )?></textarea>
				
						
					<br>
						<div class="buttons">
						  <input type="submit" name="saveChanges" value="Save" />
						</div>

					  </form>
				<?php if ( $results['Campaign']->id ) { ?>
				<p><a href="Riders.php?action=deleteCampaign&amp;CampaignId=<?php echo $results['Campaign']->id ?>" onclick="return confirm('Delete This Campaign?')"></p>
				<?php } ?>
				<?php include "templates/include/footer.php" ?>