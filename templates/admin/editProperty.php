<?php include "templates/include/header.php" ?>
					
					<br><br>
					  <h1><?php echo convertlang($results['pageTitle']); ?></h1>

				<?php if ( isset( $results['errorMessage'] ) ) { ?>
						<div class="alert-danger"><?php echo $results['errorMessage'] ?></div>
				<?php } ?>


					  <form action="admin.php?action=<?php echo $results['formAction']?>" enctype="multipart/form-data" method="post">
						<input type="hidden" name="PropertyId" value="<?php echo $results['Property']->id ?>"/>
		
				
							
				<input type="hidden" class="form-control" name="id" value="<?php echo $results['Property']->id ?>"/>
				</br>
				<label for="ownername"><?php echo convertlang('Property|ownername'); ?></label>
				<input type="text" class="form-control" name="ownername" id="ownername" placeholder="<?php echo convertlang('Property|ownername'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Property']->ownername )?>" />
				</br>
				<label for="ownercontactnumber"><?php echo convertlang('Property|ownercontactnumber'); ?></label>
				<input type="number" class="form-control" name="ownercontactnumber" id="ownercontactnumber" placeholder="<?php echo convertlang('Property|ownercontactnumber'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Property']->ownercontactnumber )?>" />
				</br>
				<label for="owneremail"><?php echo convertlang('Property|owneremail'); ?></label>
				<input type="text" class="form-control" name="owneremail" id="owneremail" placeholder="<?php echo convertlang('Property|owneremail'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Property']->owneremail )?>" />
				</br>
				<label for="propertyaddress"><?php echo convertlang('Property|propertyaddress'); ?></label>
				<textarea name="propertyaddress" class="form-control" id="propertyaddress" style="height: 5em;"  placeholder="<?php echo convertlang('Property|propertyaddress'); ?>"><?php echo htmlspecialchars(  $results['Property']->propertyaddress )?></textarea>
				</br>
				<label for="propertypincode"><?php echo convertlang('Property|propertypincode'); ?></label>
				<input type="number" class="form-control" name="propertypincode" id="propertypincode" placeholder="<?php echo convertlang('Property|propertypincode'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Property']->propertypincode )?>" />
				</br>
				<label for="propertylangitude"><?php echo convertlang('Property|propertylangitude'); ?></label>
				<input type="text" class="form-control" name="propertylangitude" id="propertylangitude" placeholder="<?php echo convertlang('Property|propertylangitude'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Property']->propertylangitude )?>" />
				</br>
				<label for="propertylongitude"><?php echo convertlang('Property|propertylongitude'); ?></label>
				<input type="text" class="form-control" name="propertylongitude" id="propertylongitude" placeholder="<?php echo convertlang('Property|propertylongitude'); ?>"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Property']->propertylongitude )?>" />
				</br>
				<label for="ownernote"><?php echo convertlang('Property|ownernote'); ?></label>
				<textarea name="ownernote" class="form-control" id="ownernote" style="height: 5em;"  placeholder="<?php echo convertlang('Property|ownernote'); ?>"><?php echo htmlspecialchars(  $results['Property']->ownernote )?></textarea>
				</br>
				<label for="propertynote"><?php echo convertlang('Property|propertynote'); ?></label>
				<textarea name="propertynote" class="form-control" id="propertynote" style="height: 5em;"  placeholder="<?php echo convertlang('Property|propertynote'); ?>"><?php echo htmlspecialchars(  $results['Property']->propertynote )?></textarea>
					
				<input type="hidden" class="form-control" name="uni_code" value="<?php if($results['Property']->uni_code == ""){echo randomstr(15);}else{echo $results['Property']->uni_code;} ?>"/>
				</br>
				<label for="assigned_to"><?php echo convertlang('Property|assigned_to'); ?></label>
				<select name="assigned_to" class="form-control" id="assigned_to" placeholder="<?php echo convertlang('Property|assigned_to'); ?>">
				<?php 
					if($results['Property']->assigned_to != null)
					{
						echo '<option value="'.Riders::getById( (int)$results['Property']->assigned_to)->id.'">'.Riders::getById( (int)$results['Property']->assigned_to)->ridername.'</option>';
					}
						
						foreach($data_Riders["results"] as $assigned_to_option)
						{	
						echo '<option value="'.$assigned_to_option->id.'">'.$assigned_to_option->ridername.'</option>';	
						}
				?>	
				</select>
				</br>
				<label for="property_block"><?php echo convertlang('Property|property_block'); ?></label>
				<select name="property_block" class="form-control" id="property_block" placeholder="<?php echo convertlang('Property|property_block'); ?>">
				<?php 
					if($results['Property']->property_block != null)
					{
						echo '<option value="'.Flag::getById( (int)$results['Property']->property_block)->flagvalue.'">'.Flag::getById( (int)$results['Property']->property_block)->flagname.'</option>';
					}
						
						foreach($data_Flag["results"] as $property_block_option)
						{	
						echo '<option value="'.$property_block_option->flagvalue.'">'.$property_block_option->flagname.'</option>';	
						}
				?>	
				</select>
				</br>
				<label for="assigned_company"><?php echo convertlang('Property|assigned_company'); ?></label>
				<select name="assigned_company" class="form-control" id="assigned_company" placeholder="<?php echo convertlang('Property|assigned_company'); ?>">
				<?php 
					if($results['Property']->assigned_company != null)
					{
						echo '<option value="'.Company::getById( (int)$results['Property']->assigned_company)->id.'">'.Company::getById( (int)$results['Property']->assigned_company)->companyname.'</option>';
					}
						
						foreach($data_Company["results"] as $assigned_company_option)
						{	
						echo '<option value="'.$assigned_company_option->id.'">'.$assigned_company_option->companyname.'</option>';	
						}
				?>	
				</select>
				
						
					<br>
						<div class="buttons">
						  <input type="submit" name="saveChanges" value="Save" />
						</div>

					  </form>
				<?php if ( $results['Property']->id ) { ?>
				<p><a href="admin.php?action=deleteProperty&amp;PropertyId=<?php echo $results['Property']->id ?>" onclick="return confirm('Delete This Property?')"><?php echo convertlang("Main|Delete Property|objname"); ?></a></p>
				<?php } ?>
				<?php include "templates/include/footer.php" ?>