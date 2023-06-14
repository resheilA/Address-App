<?php include "templates/include/header.php" ?>
					
					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>

				<?php if ( isset( $results['errorMessage'] ) ) { ?>
						<div class="alert-danger"><?php echo $results['errorMessage'] ?></div>
				<?php } ?>


					  <form action="admin.php?action=<?php echo $results['formAction']?>" enctype="multipart/form-data" method="post">
						<input type="hidden" name="PayoutId" value="<?php echo $results['Payout']->id ?>"/>
		
				
							
				<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $results['Payout']->id ?>"/>
					
				<input type="hidden" class="form-control" name="payoutid" id="payoutid" value="<?php if($results['Payout']->payoutid == ""){echo randomstr(15);}else{echo $results['Payout']->payoutid;} ?>"/>
				</br>
				<label for="payoutrider"><?php echo convertlang('Payout|payoutrider'); ?></label>
				<select name="payoutrider" class="form-control" id="payoutrider" placeholder="<?php echo convertlang('Payout|payoutrider'); ?>">
				<?php 
					if($results['Payout']->payoutrider != null)
					{
						echo '<option value="'.Riders::getByRidercode( $results['Payout']->payoutrider)->ridercode.'">'.Riders::getByRidercode( $results['Payout']->payoutrider)->ridername.'</option>';
					}
						
						foreach($data_Riders["results"] as $payoutrider_option)
						{	
						echo '<option value="'.$payoutrider_option->ridercode.'">'.$payoutrider_option->ridername.'</option>';	
						}
				?>	
				</select>
				</br>
				<label for="payoutcompany"><?php echo convertlang('Payout|payoutcompany'); ?></label>
				<select name="payoutcompany" class="form-control" id="payoutcompany" placeholder="<?php echo convertlang('Payout|payoutcompany'); ?>">
				<?php 
					if($results['Payout']->payoutcompany != null)
					{
						echo '<option value="'.Company::getByCompanycode( $results['Payout']->payoutcompany)->companycode.'">'.Company::getByCompanycode( $results['Payout']->payoutcompany)->companyname.'</option>';
					}
						
						foreach($data_Company["results"] as $payoutcompany_option)
						{	
						echo '<option value="'.$payoutcompany_option->companycode.'">'.$payoutcompany_option->companyname.'</option>';	
						}
				?>	
				</select>
				</br>
				<label for="payoutamt"><?php echo convertlang('Payout|payoutamt'); ?></label>
				<input type="number" class="form-control" name="payoutamt" id="payoutamt" placeholder="<?php echo convertlang('Payout|payoutamt'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Payout']->payoutamt )?>" />
				</br>
				<label for="payoutaddedon"><?php echo convertlang('Payout|payoutaddedon'); ?></label>
				<input type="datetime-local" class="form-control" name="payoutaddedon" id="payoutaddedon" placeholder="<?php echo convertlang('Payout|payoutaddedon'); ?>" value="<?php echo htmlspecialchars( $results['Payout']->payoutaddedon )?>" />
				</br>
				<label for="payoutstatus"><?php echo convertlang('Payout|payoutstatus'); ?></label>
				<select name="payoutstatus" class="form-control" id="payoutstatus" placeholder="<?php echo convertlang('Payout|payoutstatus'); ?>">
				<?php 
					if($results['Payout']->payoutstatus != null)
					{
						echo '<option value="'.Paymentmode::getById( $results['Payout']->payoutstatus)->id.'">'.Paymentmode::getById( $results['Payout']->payoutstatus)->paymentmodename.'</option>';
					}
						
						foreach($data_Paymentmode["results"] as $payoutstatus_option)
						{	
						echo '<option value="'.$payoutstatus_option->id.'">'.$payoutstatus_option->paymentmodename.'</option>';	
						}
				?>	
				</select>
				</br>
				<label for="payoutdescription"><?php echo convertlang('Payout|payoutdescription'); ?></label>
				<textarea name="payoutdescription" class="form-control" id="payoutdescription" style="height: 5em;"  placeholder="<?php echo convertlang('Payout|payoutdescription'); ?>"><?php echo htmlspecialchars(  $results['Payout']->payoutdescription )?></textarea>
				
						
					<br>
						<div class="buttons">
						  <input type="submit" name="saveChanges" value="Save" />
						</div>

					  </form>
				<?php if ( $results['Payout']->id ) { ?>
				<p><a href="admin.php?action=deletePayout&amp;PayoutId=<?php echo $results['Payout']->id ?>" onclick="return confirm('Delete This Payout?')"><?php echo convertlang("Main|Delete Payout|objname"); ?></a></p>
				<?php } ?>
				<?php include "templates/include/footer.php" ?>