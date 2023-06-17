<?php include "templates/include/header.php" ?>
					
					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>

				<?php if ( isset( $results['errorMessage'] ) ) { ?>
						<div class="alert-danger"><?php echo $results['errorMessage'] ?></div>
				<?php } ?>


					  <form action="admin.php?action=<?php echo $results['formAction']?>" enctype="multipart/form-data" method="post">
						<input type="hidden" name="CampaignId" value="<?php echo $results['Campaign']->id ?>"/>
		
				
							
				<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $results['Campaign']->id ?>"/>
				</br>
				<label for="campaignname"><?php echo convertlang('Campaign|campaignname'); ?></label>
				<input type="text" class="form-control" name="campaignname" id="campaignname" placeholder="<?php echo convertlang('Campaign|campaignname'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Campaign']->campaignname )?>" />
				</br>
				<label for="campaigndescription"><?php echo convertlang('Campaign|campaigndescription'); ?></label>
				<textarea name="campaigndescription" class="form-control" id="campaigndescription" style="height: 5em;"  placeholder="<?php echo convertlang('Campaign|campaigndescription'); ?>"><?php echo htmlspecialchars(  $results['Campaign']->campaigndescription )?></textarea>
				</br>
				<label for="campaigncompany"><?php echo convertlang('Campaign|campaigncompany'); ?></label>
				<select name="campaigncompany" class="form-control" id="campaigncompany" placeholder="<?php echo convertlang('Campaign|campaigncompany'); ?>">
				<?php 
					if($results['Campaign']->campaigncompany != null)
					{
						echo '<option value="'.Company::getByCompanycode( $results['Campaign']->campaigncompany)->companycode.'">'.Company::getByCompanycode( $results['Campaign']->campaigncompany)->companyname.'</option>';
					}
						
						foreach($data_Company["results"] as $campaigncompany_option)
						{	
						echo '<option value="'.$campaigncompany_option->companycode.'">'.$campaigncompany_option->companyname.'</option>';	
						}
				?>	
				</select>
					
				<input type="hidden" class="form-control" name="campaignaddedon" id="campaignaddedon" value="<?php echo $results['Campaign']->campaignaddedon ?>"/>
				
						
					<br>
						<div class="buttons">
						  <input type="submit" name="saveChanges" value="Save" />
						</div>

					  </form>
				<?php if ( $results['Campaign']->id ) { ?>
				<p><a href="admin.php?action=deleteCampaign&amp;CampaignId=<?php echo $results['Campaign']->id ?>" onclick="return confirm('Delete This Campaign?')"><?php echo convertlang("Main|Delete Campaign|objname"); ?></a></p>
				<?php } ?>
				<?php include "templates/include/footer.php" ?>