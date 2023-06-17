<?php include "templates/include/Companyheader.php" ?>
					
					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>

				<?php if ( isset( $results['errorMessage'] ) ) { ?>
						<div class="alert-danger"><?php echo $results['errorMessage'] ?></div>
				<?php } ?>


					  <form action="Company.php?action=<?php echo $results['formAction']?>" enctype="multipart/form-data" method="post">
						<input type="hidden" name="CampaignId" value="<?php echo $results['Campaign']->id ?>"/>
		
				
							
				<input type="hidden" id="id" class="form-control" name="id" value="<?php echo $results['Campaign']->id ?>"/>
				</br>
				<label for="campaignname"><?php echo convertlang('Campaign|campaignname'); ?></label>
				<input type="text" class="form-control" name="campaignname" id="campaignname" placeholder="<?php echo convertlang('Campaign|campaignname'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Campaign']->campaignname )?>" />
				</br>
				<label for="campaigndescription"><?php echo convertlang('Campaign|campaigndescription'); ?></label>
				<textarea name="campaigndescription" class="form-control" id="campaigndescription" style="height: 5em;"  placeholder="<?php echo convertlang('Campaign|campaigndescription'); ?>"><?php echo htmlspecialchars(  $results['Campaign']->campaigndescription )?></textarea>
				<?php $results['Campaign']->campaigncompany = $_SESSION["companycode"]; ?>	
				<input type="hidden" id="campaigncompany" class="form-control" name="campaigncompany" value="<?php echo $results['Campaign']->campaigncompany ?>"/>
					
				<input type="hidden" id="campaignaddedon" class="form-control" name="campaignaddedon" value="<?php echo $results['Campaign']->campaignaddedon ?>"/>
				
						
					<br>
						<div class="buttons">
						  <input type="submit" name="saveChanges" value="Save" />
						</div>

					  </form>
				<?php if ( $results['Campaign']->id ) { ?>
				<p><a href="Company.php?action=deleteCampaign&amp;CampaignId=<?php echo $results['Campaign']->id ?>" onclick="return confirm('Delete This Campaign?')"></p>
				<?php } ?>
				<?php include "templates/include/footer.php" ?>